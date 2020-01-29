<?php

namespace App\Controller;

use App\Entity\Performance;
use App\Form\PerformanceType;
use App\Repository\PerformanceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class WildController extends AbstractController
{
    /**
     * @Route("/", name="welcome", methods={"GET"})
     */
    public function welcome()
    {
        return $this->render('base.html.twig'
        );
    }
    /**
     * @Route("performance", name="performance", methods={"GET"})
     */

    public function performance()
    {
        return $this->render('front/performance.html.twig'
        );
    } /**
 * @Route("/booking", name="booking", methods={"GET"})
 */

    public function booking()
    {
        return $this->render('front/booking.html.twig'
        );
    }
    /**
     * @Route("contact/", name="contact", methods={"GET"})
     */
    public function contact()
    {
        return $this->render('front/contact.html.twig'
        );
    }

}