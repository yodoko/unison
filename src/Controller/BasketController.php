<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/basket")
 */
class BasketController extends AbstractController
{
    /**
     * @Route("/", name="basket_index")
     */
    public function index()
    {
        $authentified = false;

        if($this->getUser()){
            $authentified = true;
        }

        $options = [
            'authentified' => $authentified,
        ];
        // if authentified 
        return $this->render('cart/index.html.twig', $options);
        // else
        // return $this->render('cart/connection.html.twig');
    }

    /**
     * @Route("/add", name="basket_add")
     */
    public function add()
    {

        // do something if user is connected

        // then redirecy somewhere
        return $this->redirectToRoute('product_index');
    }

     /**
     * @Route("/confirm", name="basket_confirm")
     */
    public function confirm()
    {
        return $this->render('cart/index.html.twig');
    }

}
