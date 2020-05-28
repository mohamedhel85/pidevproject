<?php

namespace spec\AppBundle\Service;

use AppBundle\Service\fileMover;
use PhpSpec\ObjectBehavior;
use Symfony\Component\Filesystem\Filesystem;


// to use phpspec in windows type vendor\bin\phpspec in the command prompt without the php keyword
//vendor\bin\phpspec desc AppBundle/Service/fileMover to create a service called FileMover
//vendor\bin\phpspec run allow us to run test

class FileMoverSpec extends ObjectBehavior
{
    private $fs;

    function let(filesystem $filesystem)
    {
        $this->fs= $filesystem;
        $this->beConstructedWith($filesystem);// every time the fileMover class is created it will be created with an instance of filesystem.
    }

    function it_is_initializable() //check if the FileMover class exists
    {

        $this->shouldHaveType(fileMover::class);
    }

    function it_can_move_file_to_secure_location()
    {
        $currentLocation='test';
        $newLocation='new';
        //test if the file can be moved from it original location to the more secure location
    $this->move($currentLocation, $newLocation)->shouldReturn(true);

    $this->fs->rename($currentLocation, $newLocation)->shouldHaveBeenCalled();
    }
}
