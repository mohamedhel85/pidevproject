<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\Image;
use AppBundle\Form\DataTransformer\FileTransformer;
use Psr\Log\LoggerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class customFileType extends AbstractType
{   private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger= $logger;
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       $builder
           ->add('file', FileType::class)
           ->addViewTransformer(new FileTransformer(
               $this->logger
           ));

        //we need to add our custom file type
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        /**
         * @var $entity Image
         */
     $entity= $form->getParent()->getData();

     if($entity){
         if($entity->getFilename()===null){
             $path=null;
         }
         else{
             $path= '/img/'. $entity->getFilename();
         }
            $view->vars['view_url']= $path;
     }
        dump('view_url');
        dump($view);
        dump($form);
        dump($options);

    }
    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'custom_file';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'file_url'=> null,
        ]);
    }
}