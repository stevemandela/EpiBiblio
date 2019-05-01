<?php
namespace EPI\UserBundle\Services;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageUploader
{
    private $targetDir;

    public function __construct($targetDir)
    {
        $this->targetDir = $targetDir;
    }

    public function upload(UploadedFile $file)
    {
        $imageName = md5(uniqid()).'.'.$file->guessExtension();

        $file->move($this->getTargetDir(), $imageName);

        return $imageName;
    }

    public function getTargetDir()
    {
        return $this->targetDir;
    }
}
