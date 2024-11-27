<?php

namespace App\Controller;

use App\Entity\ContratPret;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Routing\Annotation\Route;

class ContratPretController extends AbstractController
{
    //#[Route('/contrat/pret', name: 'app_contrat_pret')]
    public function index(): Response
    {
        return $this->render('contrat_pret/index.html.twig', [
            'controller_name' => 'ContratPretController',
        ]);
    }

    public function lister(ManagerRegistry $doctrine)
    {
        $contratsprets = $doctrine->getRepository(ContratPret::class)->findAll();

        return $this->render('contrat_pret/lister.html.twig', [
            'pContratsPrets' => $contratsprets,
        ]);	
    }
}
