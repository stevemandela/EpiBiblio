<?php

namespace EPI\UserBundle\EventListener;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use EPI\UserBundle\Entity\Livres;
use EPI\UserBundle\Services\ImageUploader;
use Symfony\Component\HttpFoundation\File\File;

class ImagesUploadListener
{
    private $uploader;

    public function __construct(ImageUploader $uploader)
    {
        $this->uploader = $uploader;
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->uploadFile($entity);
    }

    public function preUpdate(PreUpdateEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->uploadFile($entity);
    }

    private function uploadFile($entity)
    {
        // upload only works for Product entities
        if (!$entity instanceof Livres) {
            return;
        }

        $file = $entity->getImage();

        // only upload new files
        if ($file instanceof UploadedFile) {
            $imageName = $this->uploader->upload($file);
            $entity->setImage($imageName);
        }
    }


    public function postLoad(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if (!$entity instanceof Livres) {
            return;
        }

        if ($imageName = $entity->getImage()) {
            $entity->setImage(new File($this->uploader->getTargetDir().'/'.$imageName));
        }
    }
}
