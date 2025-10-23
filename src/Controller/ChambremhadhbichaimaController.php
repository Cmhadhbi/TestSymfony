<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ChambremhadhbichaimaRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Chambremhadhbichaima;
use App\Form\ChambremhadhbichaimaType;

final class ChambremhadhbichaimaController extends AbstractController
{
    #[Route('/Chambremhadhbichaima', name: 'app_chambre')]
    public function index(): Response
    {
        return $this->render('Chambremhadhbichaima/index.html.twig', [
            'controller_name' => 'ChambreController',
        ]);
    }

    #[Route('/chambre/{id}', name: 'client_showroom', methods: ['GET'])]
    public function showroom(ChambremhadhbichaimaRepository $chambreRepo, int $id): Response
    {
        $chambre = $chambreRepo->find($id);
        if (!$chambre) {
            throw $this->createNotFoundException('Room not found.');
        }

        // pass as an array so the Twig loop iterates
        return $this->render('Chambremhadhbichaima/showroom.html.twig', [
            'showroom' => [$chambre],
        ]);
    }

    #[Route('/updateformroom/{id}', name: 'app_updateformroom')]
    public function updateformroom(int $id, Request $req, ChambremhadhbichaimaRepository $repo, ManagerRegistry $m): Response
    {
        $em = $m->getManager();
        $commande = $repo->find($id);
        if (!$commande) {
            throw $this->createNotFoundException('Room not found.');
        }

        $form = $this->createForm(ChambremhadhbichaimaType::class, $commande);
        $form->handleRequest($req);

        if ($form->isSubmitted() && $form->isValid()) {
            // entity is managed, flush is enough; persist is harmless but not necessary
            $em->flush();

            return $this->redirectToRoute('client_showroom', ['id' => $id]);
        }

        return $this->render('Chambremhadhbichaima/updateformroom.html.twig', [
            'f' => $form->createView(),
            'commande' => $commande,
        ]);
    }

    #[Route('/showdetails/{id}', name: 'app_showdetails')]
    public function showdetails(int $id, ChambremhadhbichaimaRepository $repo): Response
    {
        $c = $repo->find($id);
        if (!$c) {
            throw $this->createNotFoundException('Item not found.');
        }

        return $this->render('Chambremhadhbichaima/showdetails.html.twig', [
            'showdetails' => $c,
        ]);
    }
}
