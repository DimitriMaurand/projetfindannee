<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FontVinController extends AbstractController
{
    #[Route('/font/vin', name: 'app_font_vin')]
    public function index(): Response
    {
        return $this->render('font_vin/index.html.twig', [
            'controller_name' => 'FontVinController',
        ]);
    }
}
