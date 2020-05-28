<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DomeController extends Controller
{
    /**
     * @Route("/images", name="domehomepage")
     */
    public function indexAction(Request $request)
    {
        $images=$this->getDoctrine()->getRepository('AppBundle:Image')->findAll();
        $paginator= $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $images, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            6 /*limit per page*/
        );

        return $this->render('dome/domeindex.html.twig',[
            'images'=> $pagination]);
    }

    /**
     * @Route("/view", name="imagedetail")
     */
    public function imagedetailAction()
    {
        $image='exterior-323835.jpg';
        return $this->render('image/imagedetail.html.twig',['image'=> $image]);
    }
}
