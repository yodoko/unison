<?php

namespace App\Controller;

use App\Repository\AddressRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
     * @Route("/address")
     */
class AddressController extends AbstractController
{
    /**
     * @Route("/", name="address")
     */
    public function index(AddressRepository $addressRepository)
    {   
        if(!$this->getUser()){
            return $this->redirectToRoute('app_login');
        }

        // Here you must retrieve the information using the user_id property
        $id = $this->getUser()->getId();        

        // NOT WORKING 
        // Load the addresses using AddressRepository
        $address_array = $addressRepository->getAddresses($id);

        // Give addresss or empty array to template
        return $this->render('address/index.html.twig', [
            'address_array' => $address_array,
        ]);
    }


    /**
     * @Route("/edit", name="address_edit")
     */
    public function edit()
    {
        return $this->render('address/index.html.twig', [
            'controller_name' => 'AddressController',
        ]);
    }

}
