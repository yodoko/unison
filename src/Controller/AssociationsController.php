<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AssociationsController extends AbstractController
{
    /**
     * @Route("/associations", name="app_associations")
     */
    public function associations()
    {
        $charity_array = [
            [
                'name' => 'Un Super troll',
                'image_name' => 'about_us/france.png',
                'link' => '#',
                'texts' => [
                    'super troll',
                    'OUH OUH',
                ]
            ],
            [   
                'name' => 'Sea shepherd',
                'image_name' => 'charity/sea_shepherd.JPG',
                'link' => 'https://www.seashepherd.fr/',
                'texts' => [
                    'Fondée en 1977 par le capitaine Paul Watson, SEA SHEPHERD est l\'ONG de
                    défense des océans la plus combative au monde.',
                    'Sea Shepherd travaille sur troix axes majeurs :',
                    'Dépasser la seule protestation et intervenir de manière active et non violente dans les
                    cas d\'atteintes illégales à la vie marine et aux écosystèmes marins.',
                    'Exposer les abus et les pratiques non durables ou non éthiques d\'atteintes
                    à la vie marine et à l\'intégrité des écosystèmes marins en alertant
                    les médias et l\'opinion publique.',
                    'Sea Shepherd travaille sur troix axes majeurs :',
                ]
            ],
            [   
                'name' => 'Un troll',
                'image_name' => 'about_us/lin.JPG',
                'link' => '#',
                'texts' => [
                    'un paragraphe',
                    'un autre',
                    'trop',
                    'un dernier pour la route',
                    'Phew phew PHEW',
                ]
            ],
                
            [   
                'name' => 'Un duper troll',
                'image_name' => 'about_us/france.png',
                'link' => '#',
                'texts' => [
                    'IPSUM LOREM',
                    'LOREM IPSUM',
                    '</p><h1>LOREM IPSUM</h1><p>OUmOU',
                ]
            ],
        ];
        
        $options = [
            'authentified' => false,
            'charity_array' => $charity_array,
        ];
        
        return $this->render('charity/index.html.twig', $options);
    }
}
