<?php

namespace AppBundle\Service;

class fileMoverPath
{
    /**
     * @var string
     */
    private $fileDirectoryPath;

public function __construct(string $fileDirectoryPath)
{
    $this->fileDirectoryPath= $fileDirectoryPath;
}

public function getNewFilePath(string $newfilePath)
{
return $this->fileDirectoryPath.$newfilePath;
}
}