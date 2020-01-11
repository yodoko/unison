<?php

namespace App\Controller;

use App\Repository\CharityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/charity")
 */
class CharityController extends AbstractController
{
    /**
     * @Route("/", name="charity_index")
     */
    public function associations(CharityRepository $charityRepository)
    {
        $charity_array = $charityRepository->findAll();
        
        return $this->render('charity/index.html.twig', [
            'charity_array' => $charity_array,
        ]);
    }
}
