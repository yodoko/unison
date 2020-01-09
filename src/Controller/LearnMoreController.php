<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LearnMoreController extends AbstractController
{
    /**
     * @Route("/learnmore", name="app_learnmore")
     */
    public function contact()
    {
        return $this->render('about_us/index.html.twig');
    }
}
