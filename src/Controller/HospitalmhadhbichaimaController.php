<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\HospitalmhadhbichaimaRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Hospitalmhadhbichaima;


final class HospitalmhadhbichaimaController extends AbstractController
{
    #[Route('/Hospitalmhadhbichaima', name: 'app_Hospitalmhadhbichaima')]
    public function index(): Response
    {
        return $this->render('Hospitalmhadhbichaima/index.html.twig', [
            'controller_name' => 'HospitalController',
        ]);
    }
    #[Route('/showhospital', name: 'app_showHospitalmhadhbichaima')]
    public function showhospital(HospitalmhadhbichaimaRepository $Hrep): Response
    {
        $c=$Hrep->findAll();
        return $this->render('Hospitalmhadhbichaima/showhospital.html.twig', [
            'showHospital' => $c,
        ]);
    }
    #[Route('/deleteHospitalmhadhbichaima/{id}', name: 'app_deleteHospitalmhadhbichaima')]
    public function deleteHospitalmhadhbichaima($id,HospitalmhadhbichaimaRepository $Hrep,ManagerRegistry $m): Response
    {
        $em=$m->getManager();
       // $del=$authorrep->find($id);
       $del=$Hrep->findjoinbyid($id);
       $em->remove($del);
        $em->flush();
        return $this->redirectToRoute('app_showHospitalmhadhbichaima');
    }
}
