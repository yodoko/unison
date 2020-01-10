<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BasketController extends AbstractController
{
    /**
     * @Route("/basket", name="app_basket")
     */
    public function index()
    {
        // if authentified 
        return $this->render('cart/index.html.twig');
        // else
        // return $this->render('cart/connection.html.twig');
    }

    /**
     * @Route("/basket/add", name="app_basket_add")
     */
    public function add()
    {
        return $this->redirectToRoute('app_articles');
    }

     /**
     * @Route("/basket/confirm", name="app_basket_confirm")
     */
    public function confirm()
    {
        return $this->render('cart/index.html.twig');
    }

}
