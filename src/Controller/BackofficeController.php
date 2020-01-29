<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Booking;
use App\Form\BookingType;
use App\Repository\BookingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Twig\Environment;
use Twig\Extensions\IntlExtension;

class BackofficeController extends AbstractController
{

    /**
     * @Route("/admin", name="admin")
     */
    public function Backoffice()
    {

        return $this->render('/landingpage.html.twig');
    }
}
