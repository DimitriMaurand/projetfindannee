<?php

namespace App\Controller;

use App\Entity\Boisson;
use App\Form\BoissonType;
use App\Repository\BoissonRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/admin/boisson')]
final class BoissonController extends AbstractController
{
    #[Route(name: 'app_boisson_index', methods: ['GET'])]
    public function index(BoissonRepository $boissonRepository, SerializerInterface $serizlize): Response
    {
        $boisson = $boissonRepository->findAll();

        $data = $serizlize->serialize($boisson, 'json', ['groups' => 'boisson']);
        return $this->render('boisson/index.html.twig', [
            'boissons' => $boissonRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_boisson_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $boisson = new Boisson();
        $form = $this->createForm(BoissonType::class, $boisson);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($boisson);
            $entityManager->flush();

            return $this->redirectToRoute('app_boisson_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('boisson/new.html.twig', [
            'boisson' => $boisson,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_boisson_show', methods: ['GET'])]
    public function show(Boisson $boisson): Response
    {
        return $this->render('boisson/show.html.twig', [
            'boisson' => $boisson,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_boisson_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Boisson $boisson, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(BoissonType::class, $boisson);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_boisson_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('boisson/edit.html.twig', [
            'boisson' => $boisson,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_boisson_delete', methods: ['POST'])]
    public function delete(Request $request, Boisson $boisson, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $boisson->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($boisson);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_boisson_index', [], Response::HTTP_SEE_OTHER);
    }
}
