<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Entity\Message;
use App\Entity\Performance;
use App\Entity\Artist;
use App\Form\BookingType;
use App\Form\Message1Type;
use App\Form\PerformanceType;
use App\Repository\PerformanceRepository;
use App\Repository\ArtistRepository;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;


/**
 * @Route("/")
 */
class WildController extends AbstractController
{

    /**
     * @Route("/", name="welcome", methods={"GET"})
     */
    public function welcome(ArtistRepository $artistRepository)
    {
        return $this->render('base.html.twig',[
            'artists' => $artistRepository->findAll(),

        ]);

    }

    /**
     * @Route("/map", name="map")
     */
    public function map(Request $request)
    {
        return $this->render('front/map.html.twig');

    }






    /**
     * @Route("performance", name="performance", methods={"GET"})
     */

    public function performance(PerformanceRepository $performanceRepository)
    {
        return $this->render('front/performance.html.twig',[
            'performances' => $performanceRepository->findAll(),
        ]);
    }


    /**
     * @Route("/addbook", name="booking_add", methods={"GET","POST"})
     */
    public function add(Request $request, \Swift_Mailer $mailer): Response
    {
        $booking = new Booking();
        $form = $this->createForm(BookingType::class, $booking);
        $form->handleRequest($request);

        $firstname = $form['Firstname']->getData();
        $lastname = $form['Lastname']->getData();
        $email = $form['Email']->getData();
        $shows = $form['Shows']->getData();
        $ReducedTickets = $form['ReducedTickets']->getData();
        $FullPrice = $form['FullPrice']->getData();


        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($booking);
            $entityManager->flush();

            $sentMessage = (new \Swift_Message('Wild Circus'))
                ->setFrom('mercibien8@gmail.com')
                ->setTo($email)
                ->setBody(
                    $this->renderView(
                        'email/booking.html.twig',array('firstname' => $firstname)
                    ),
                    'text/html'
                );
            $mailer->send($sentMessage);

            $sentMessage2 = (new \Swift_Message('Wild Circus'))
                ->setFrom('mercibien8@gmail.com')
                ->setTo($email)
                ->setBody(
                    $this->renderView(
                        'email/newbooking.html.twig',array('firstname' => $firstname, 'lastname' =>$lastname, 'email' => $email, 'shows' =>$shows, 'reducedTickets' =>$ReducedTickets, 'fullPrice' =>$FullPrice )
                    ),
                    'text/html'
                );
            $mailer->send($sentMessage2);


            return $this->redirectToRoute('success');
        }

        return $this->render('front/booking.html.twig', [
            'booking' => $booking,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/contact", name="contact", methods={"GET","POST"})
     */
    public function message(Request $request, \Swift_Mailer $mailer): Response
    {
        $message = new Message();
        $form = $this->createForm(Message1Type::class, $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $firstname = $form['firstname']->getData();
            $lastname = $form['lastname']->getData();
            $email = $form['email']->getData();
            $text = $form['message']->getData();


            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($message);
            $entityManager->flush();

            $sentMessage = (new \Swift_Message('Wild Circus'))
                ->setFrom('mercibien8@gmail.com')
                ->setTo($email)
                ->setBody(
                    $this->renderView(
                        'email/customer.html.twig',array('firstname' => $firstname)
                    ),
                    'text/html'
                );
            $mailer->send($sentMessage);

            $sentMessage2 = (new \Swift_Message('Wild Circus'))
                ->setFrom('mercibien8@gmail.com')
                ->setTo($email)
                ->setBody(
                    $this->renderView(
                        'email/wildcircus.html.twig',array('firstname' => $firstname, 'lastname' =>$lastname, 'email' => $email, 'message' =>$text)
                    ),
                    'text/html'
                );
            $mailer->send($sentMessage2);

            return $this->redirectToRoute('success_message');

        }

        return $this->render('front/contact.html.twig', [
            'message' => $message,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/success", name="success", methods={"GET","POST"})
     */
    public function success()
    {
        return $this->render('front/success.html.twig'
        );
    }

    /**
     * @Route("/successmessage", name="success_message", methods={"GET","POST"})
     */
    public function successmessage()
    {
        return $this->render('front/successmessage.html.twig'
        );
    }
}