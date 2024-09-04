<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FontDessertController extends AbstractController
{
    #[Route('/font/dessert', name: 'app_font_dessert')]
    public function index(): Response
    {
        return $this->render('font_dessert/index.html.twig', [
            'controller_name' => 'FontDessertController',
        ]);
    }
}
