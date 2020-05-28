<?php

namespace AppBundle\Event\Listener;
use AppBundle\Service\fileMoverPath;
use AppBundle\Entity\Image;
use AppBundle\Service\fileMover;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

class FileUploaderListener
{
    private $fileMover;
    private $fileMoverPath;

    public function __construct(FileMover $fileMover,fileMoverPath $fileMoverPath)
    {
    $this->fileMover = $fileMover;
    $this->fileMoverPath=$fileMoverPath;
    }

    public function prePersist(LifecycleEventArgs $eventArgs)
    {
        $entity = $eventArgs->getEntity();
        $this->upload($entity);


                    
    }

    public function preUpdate(PreUpdateEventArgs $eventArgs)
    {
        $this->upload(
            $eventArgs->getEntity());
    }

    private function upload($entity)
    {
        // if not instance of Image return false
        if(false=== $entity instanceof Image){
            return false;
        }
        //move the uploaded file
        /**
         * @var $entity Image
         */
        //get access to the file
        $file = $entity->getFile();
        $temporaryFileLocation=$file->getPathname(); //get file original path
        $newFileLocation = $this->fileMoverPath->getNewFilePath($file->getClientOriginalName()); //get the file name when we uploaded;

        // move the file to the secure location
        $this->fileMover->move($temporaryFileLocation,$newFileLocation);
        [
            0=> $width,
            1=> $height,
        ] = getimagesize($newFileLocation);
        //additional information
        $entity ->setFilename(
            $file->getClientOriginalName()
        );
        $entity->setWidth($width);
        $entity->setHeight($height);
        return true;
    }
}
