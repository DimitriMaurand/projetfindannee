<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FontBoissonController extends AbstractController
{
    // #[Route('/font/boisson', name: 'app_font_boisson')]
    // public function index(): Response
    // {
    //     return $this->render('font_boisson/index.html.twig', [
    //         'controller_name' => 'FontBoissonController',
    //     ]);
    // }

    #[Route('/font/boisson', name: 'app_font_boisson')]
    public function index(): Response
    {


        // Redirection vers la même route pour forcer le rechargement
        return $this->redirectToRoute(
            'app_font_boisson',
            [
                'controller_name' => 'FontBoissonController',
            ]
        );
    }
}




// use Symfony\Component\HttpFoundation\RequestStack;

// class FontBoissonController extends AbstractController
// {
//     private $requestStack;

//     public function __construct(RequestStack $requestStack)
//     {
//         $this->requestStack = $requestStack;
//     }

//     #[Route('/font/boisson', name: 'app_font_boisson')]
//     public function index(): Response
//     {
//         $request = $this->requestStack->getCurrentRequest();

//         // Vérifie si la page a déjà été rechargée
//         if ($request->query->get('reloaded') !== 'true') {
//             // Redirection vers la même route avec un paramètre de requête
//             return $this->redirectToRoute('app_font_boisson', ['reloaded' => 'true']);
//         }

//         return $this->render('font_boisson/index.html.twig', [
//             'controller_name' => 'FontBoissonController',
//         ]);
//     }
// }
