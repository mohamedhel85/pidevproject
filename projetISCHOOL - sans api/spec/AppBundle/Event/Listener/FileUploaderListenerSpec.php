<?php

namespace spec\AppBundle\Event\Listener;

use AppBundle\Event\Listener\FileUploaderListener;
use AppBundle\Service\fileMover;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FileUploaderListenerSpec extends ObjectBehavior
{
    private $fileMover;
    function let(FileMover $fileMover)
    {
        $this->beConstructedWith($fileMover);
        $this->fileMover= $fileMover;
    }
    function it_is_initializable()
    {
        $this->shouldHaveType(FileUploaderListener::class);
    }

    function  it_returns_if_LifecycleEventArgs_eventArgs_is_not_assosiated_to_image(LifecycleEventArgs $eventArgs)
    {
        $this->prePersist($eventArgs)->shouldReturn(false);
        $this->fileMover->move(
            Argument::any(),
            Argument::any()
        )->shouldNotHaveBeenCalled();
    }

    function it_can_prePersist(LifecycleEventArgs $eventArgs)
    {
        $originalpath='test';
        $newpath='test2';
        $this->prePersist($eventArgs);
        $this->fileMover-> move($originalpath,$newpath)->shouldHaveBeenCalled();

    }

    function it_can_preUpdate(PreUpdateEventArgs $eventArgs)
    {
        $this->preUpdate($eventArgs);
    }
}
