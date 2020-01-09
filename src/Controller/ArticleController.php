<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/articles", name="app_articles")
     * @param EntityManagerInterface $entityManager
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function list(EntityManagerInterface $entityManager)
    {
        // $articles =$entityManager->getRepository(Article::class)->findAll();
        
        // return $this->render('product/index.html.twig', [
            // 'articles' => $articles
        // ]);
        
        /** 
         * Here we suppose that the back end find every first image for N products. 
         * Their id(s) for the link toward the product info page 
         * The name, price and category
        */
        
        $product_array = [
            [
                'id' => 0,   
                'product_name' => 'Nom du produit',
                'image_name' => 'blanc.jpg',
                'price' => 35.50 ,
            ],
            [   
                'id' => 1,
                'product_name' => 'Chemise tendance',
                'image_name' => 'noir.jpg',
                'price' => 53.00 ,
            ],
            [   
                'id' => 2,
                'product_name' => 'Contre le racisme',
                'image_name' => 'jaune.jpg',
                'price' => 15.00 ,
            ],
        ];
        
        $options = [
            'authentified' => false,
            'product_array' => $product_array,
        ];
        
        return $this->render('product/index.html.twig', $options);
    }

    /** 
     * @Route("/article/voir/{id}", name="app_article_view")
     * @param EntityManagerInterface $entityManager
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function view(int $id, EntityManagerInterface $entityManager) {
        $price;
        $name;
        $product_array = [];

        $charity_array = [
            [
                'id' => 0,
                'name' => 'WWF',
                'image_name' => 'logo0.png',
            ],
            [
                'id' => 1,
                'name' => 'Les restaurants du cœur',
                'image_name' => 'logo1.png',
            ],
            [
                'id' => 2,
                'name' => 'Secours populaire français',
                'image_name' => 'logo2.png',
            ],
            [
                'id' => 3,
                'name' => 'UNICEF',
                'image_name' => 'logo3.png',
            ],
            [
                'id' => 4,
                'name' => 'Action contre La Faim',
                'image_name' => 'logo4.png',
            ],
            [
                'id' => 5,
                'name' => 'Sea Shepherd Conservation Society',
                'image_name' => 'logo5.png',
            ],
            [
                'id' => 6,
                'name' => 'Croix-Rouge française',
                'image_name' => 'logo6.png',
            ],
            [
                'id' => 7,
                'name' => 'Médecins sans frontières',
                'image_name' => 'logo7.png',
            ],
            [
                'id' => 8,
                'name' => '30 Millions d\'Amis',
                'image_name' => 'logo8.png',
            ],
            [
                'id' => 9,
                'name' => 'Institut Pasteur',
                'image_name' => 'logo9.png',
            ],
        ];

        if($id === 0){
            $price = 35.00;
            $name = 'Nom du produit';

            array_push($product_array, [   
                'color' => 'blanc',
                'image_name' => 'blanc.jpg',
            ]);
            
            array_push($product_array, [   
                'color' => 'noir',
                'image_name' => 'noir.jpg',
            ]);

            array_push($product_array, [
                'color' => 'pas d\'image',
                'image_name' => 'aucune'
            ]);
            
        }else if($id === 1) {
            $price = 45.00;
            $name = 'Chemise tendance';

            array_push($product_array, [   
                'color' => 'noir',
                'image_name' => 'noir.jpg',
            ]);
        }else {
            $price = 70.00;
            $name = 'Contre le racisme';

            array_push($product_array, [   
                'color' => 'jaune',
                'image_name' => 'jaune.jpg',
            ]);
        }

        $options = [
            'authentified' => false,
            'id' => $id,
            'price' => $price,
            'name' => $name,
            'product_array' => $product_array,
            'charity_array' => $charity_array,
        ];
        
        return $this->render('product/show.html.twig', $options);
    }

    /**
     * @Route("/admin/articles/new", name="app_articles_new")
     * @param EntityManagerInterface $entityManager
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function new(EntityManagerInterface $entityManager, Request $request)
    {
        $form = $this->createForm(ArticleType::class)->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($form->getData());
            $entityManager->flush();
            return $this->redirectToRoute('app_articles');
        }
        return $this->render('articles_new.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
