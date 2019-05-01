<?php

namespace EPI\UserBundle\EventListener;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use EPI\UserBundle\Entity\Livres;
use EPI\UserBundle\Services\FileUploader;
use Symfony\Component\HttpFoundation\File\File;

class BrochureUploadListener
{
    private $uploader;

    public function __construct(FileUploader $uploader)
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

        $file = $entity->getBrochure();

        // only upload new files
        if ($file instanceof UploadedFile) {
            $fileName = $this->uploader->upload($file);
            $entity->setBrochure($fileName);
        }
    }


    public function postLoad(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if (!$entity instanceof Livres) {
            return;
        }

        if ($fileName = $entity->getBrochure()) {
            $entity->setBrochure(new File($this->uploader->getTargetDir().'/'.$fileName));
        }
    }
}
