<?php

namespace AppBundle\Service;

// symfony own filesystem will be used to import our files to secure location.
use Symfony\Component\Filesystem\Filesystem;


class fileMover
{
    /**
     * @var filesystem
     */
    private $filesystem;

    public function __construct(filesystem $filesystem)
    {
        $this->filesystem= $filesystem;
    }

    public function move($currentLocation, $newLocation)
    {   //check if the file already exists in the secure location
        if ( true === $this->filesystem->exists($newLocation))
        {
        $this->filesystem->remove($newLocation);
        }
        //rename method allow us to changes the name of a single file or directory
        $this->filesystem->rename($currentLocation,$newLocation);

       return true;
    }
}
