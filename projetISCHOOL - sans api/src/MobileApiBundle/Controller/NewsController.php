<?php

namespace MobileApiBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Image;
use AppBundle\Entity\NewsPost;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class NewsController extends Controller
{
    public function indexAction()
    {
        return $this->render('MobileApiBundle:Default:index.html.twig');
    }

    public function AllPostAction()
    {
        $posts=$this->getDoctrine()->getManager()->getRepository('AppBundle:NewsPost')->findAll();
        $serializer= new Serializer([new ObjectNormalizer()]);
        $formated= $serializer->normalize($posts);
        return new JsonResponse($formated);
    }

    public function findAction($id)
    {
        $post=$this->getDoctrine()->getManager()->getRepository('AppBundle:NewsPost')->find($id);
        $serializer= new Serializer([new ObjectNormalizer()]);
        $formated= $serializer->normalize($post);
        return new JsonResponse($formated);
    }

    public function createAction(Request $request)
    {
        $em= $this->getDoctrine()->getManager();
        $post = new NewsPost();
        $post->setTitle("post API");
        $post->setCreatedAt(new \DateTime('now'));
        $post->setCarouselDesc('this post is created using api');
        $post->setContentdesc('testetsttgsdshd');
        $em->persist($post);
        $em->flush();
        $serializer= new Serializer([new ObjectNormalizer()]);
        $formatted= $serializer->normalize($post);
        return new JsonResponse($formatted);

    }

}
