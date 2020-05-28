<?php


namespace AppBundle\Controller;

use AppBundle\Entity\Reservation;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends controller
{

    /**
     * @Route("/reservation",name="reservation")
     */
    public function indexAction(Request $request)

    {
        //test if there is unvalide reservation
        $now = new DateTime();
        $this->getDoctrine()->getRepository('AppBundle:Room')->freeRooms($now);


        $data = [];
        $data['student_email'] ='';
        $data['rooms'] = null;
        $data['dates']['from'] = '';
        $data['dates']['to'] = '';
        $form = $this->createFormBuilder()
            ->add('email', EmailType::class)
            ->add('dateFrom',DateType::class)
            ->add('dateTo',DateType::class)
            ->add('book room',SubmitType::class)
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $form_data = $form->getData();
            $data['student_email'] =$form_data['email'];
            $data['dates']['from'] = $form_data['dateFrom'];
            $data['dates']['to'] = $form_data['dateTo'];

            $test=$this->getDoctrine()->getRepository('AppBundle:Room')->studenthavereservation($data['student_email']);
            if ($test === true){
                $this->addFlash('danger', 'Erorr <a href="/" class="alert-link">you all ready have a room</a>');
            }
            else{
            $available_rooms = $this->getDoctrine()->getRepository('AppBundle:Room')->getAvailableRoom($form_data['dateFrom'], $form_data['dateTo']);
            $data['rooms'] = $available_rooms;

            $student = $this->getDoctrine()->getRepository('AppBundle:Student')->findOneBy(['email'=>$data['student_email']]);
            $data['student'] = $student;
            dump($data);

            $reservation = new Reservation();
            $date_start = $data['dates']['from'];
            $date_leave = $data['dates']['to'];
            $reservation->setDateIn($date_start);
            $reservation->setDateOut($date_leave);
            $em = $this->getDoctrine();
            $student = $em->getRepository('AppBundle:Student')->findOneBy(['email'=>$data['student_email']]);


            $reservation->setStudent($student);
            $reservation->setRoom($available_rooms[0]);

            $em = $em->getManager();
            $em->persist($reservation);
            $em->flush();
                $this->addFlash('success', 'Reservation <a href="/" class="alert-link">successful!</a>');
            return $this->redirectToRoute('reservation');

            }
        }


        return $this->render('rerservation/reservation.html.twig',['form'=> $form->createView()]);

    }


    /**
     * @Route("/book", name="roombooking")
     * @param $data
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @throws \Exception
     */
    public function bookRoom($data)
    {



    }


}