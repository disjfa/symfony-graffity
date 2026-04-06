<?php

namespace App\Controller;

use App\Repository\BlogRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(BlogRepository $blogRepository, Request $request): Response
    {
        return $this->render('home/index.html.twig', [
            'blogs' => $blogRepository->findPaginated($request->query->getInt('page', 1)),
        ]);
    }

    #[Route('/dashboard', name: 'app_dashboard')]
    public function dashboard(): Response
    {
        return $this->render('home/dashboard.html.twig');
    }
}
