<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FontEntreeController extends AbstractController
{
    #[Route('/font/entree', name: 'app_font_entree')]
    public function index(): Response
    {
        return $this->render('font_entree/index.html.twig', [
            'controller_name' => 'FontEntreeController',
        ]);
    }
}
