<?php

namespace AppBundle\Form\DataTransformer;

use Psr\Log\LoggerInterface;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class FileTransformer implements DataTransformerInterface
{
    private $logger;
    public function __construct(LoggerInterface $logger)
    {
        $this->logger=$logger; //the logger is used to setup a data transformer as a service.
    }


    /**
     * convert the data used in the code to a data that can be rendered in a form
     * @return array
     * @var $file mixed|null
     */
    public function transform($file = null)
    {
        $this->logger->debug('transformer', ['file'=> $file]);
      return ['file'=> $file];
    }

    /**
     * convert the data from submission to data can be used by the code.
     * @var $data array
     */
    public function reverseTransform($value)
    {
        $this->logger->debug('transformer', ['data'=> $value]);
        return $value['file'];
    }
}