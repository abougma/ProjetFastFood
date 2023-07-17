<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\MenuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    #[Route('/', name: 'app_app')]
    public function index(MenuRepository $menuRepository, ArticleRepository $articleRepository): Response
    {
        return $this->render('app/index.html.twig', [
            'menus' => $menuRepository->findAll(),
            'articles' =>$articleRepository->findAll(),

        ]);
    }
}
