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
                'product_name' => 'Nom du produit',
                'image_name' => 'blanc.jpg',
                'price' => 35.50 ,
            ],
            [   
                'product_name' => 'Nom du produit',
                'image_name' => 'noir.jpg',
                'price' => 35.50 ,
            ],
            [   
                'product_name' => 'Chemise tendance',
                'image_name' => 'noir.jpg',
                'price' => 53.00 ,
            ],
            [   
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
