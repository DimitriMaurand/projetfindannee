<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FontPlatController extends AbstractController
{
    #[Route('/font/plat', name: 'app_font_plat')]
    public function index(): Response
    {
        return $this->render('font_plat/index.html.twig', [
            'controller_name' => 'FontPlatController',
        ]);
    }
}
