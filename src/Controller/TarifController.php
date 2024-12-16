<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Tarif;


class TarifController extends AbstractController
{
    #[Route('/tarif', name: 'app_tarif')]
    public function index(): Response
    {
        return $this->render('tarif/index.html.twig', [
            'controller_name' => 'TarifController',
        ]);
    }

    public function lister(ManagerRegistry $doctrine){

        $repository = $doctrine->getRepository(Tarif::class);
        $tarif= $repository->findAll();

        return $this->render('tarif/lister.html.twig', [
            'tTarif' => $tarif,
        ]);	
        
    }
}
