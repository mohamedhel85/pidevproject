<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class NewsPostController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        //$data=[];
        $posts=$this->getDoctrine()->getRepository('AppBundle:NewsPost')->findAll();
        $newPosts=$this->getDoctrine()->getRepository('AppBundle:NewsPost')->getNewPosts();
       // $data['NewsPosts']=$posts;
        //$data['NewPosts']=$newPosts;


        $paginator= $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $posts, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            3 /*limit per page*/
        );

        return $this->render('news/newsindex.html.twig',['NewPosts'=>$newPosts,'NewsPosts'=>$pagination]);
    }

    /**
     * @Route("/news/post/{post_id}", name="postdetail")
     */
    public function postdetailAction($post_id)
    {

        $detail=$this->getDoctrine()->getRepository('AppBundle:NewsPost')->find($post_id);

        return $this->render('news/newspostdetail.html.twig',['PostDetail'=>$detail]);
    }

    /**
     * @Route("/aboutus", name="aboutus")
     */
    public function aboutusAction()
    {
        return $this->render('news/aboutus.html.twig');
    }

    /**
     * @Route("/contactus", name="contactus")
     */
    public function contactusAction()
    {
        return $this->render('news/contactus.html.twig');
    }
}
