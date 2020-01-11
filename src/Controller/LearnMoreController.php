<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/learnmore")
 */
class LearnMoreController extends AbstractController
{
    /**
     * @Route("/", name="learnmore_index")
     */
    public function contact()
    {
        return $this->render('about_us/index.html.twig');
    }
}
