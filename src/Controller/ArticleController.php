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
        $articles =$entityManager->getRepository(Article::class)->findAll();

        return $this->render('product/index.html.twig', [
            'articles' => $articles
        ]);
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
