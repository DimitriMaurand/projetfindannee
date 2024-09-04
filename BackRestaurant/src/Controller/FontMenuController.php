<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FontMenuController extends AbstractController
{
    #[Route('/font/menu', name: 'app_font_menu')]
    public function index(): Response
    {
        return $this->render('font_menu/index.html.twig', [
            'controller_name' => 'FontMenuController',
        ]);
    }
}
