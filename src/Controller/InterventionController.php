<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Intervention;

class InterventionController extends AbstractController
{
    // #[Route('/intervention', name: 'app_intervention')]
    public function index(): Response
    {
        return $this->render('intervention/index.html.twig', [
            'controller_name' => 'InterventionController',
        ]);
    }

    public function listerIntervention(ManagerRegistry $doctrine)
    {
        $interventions = $doctrine->getRepository(Intervention::class)->findAll();

        return $this->render('intervention/lister.html.twig', [
            'pInterventions' => $interventions,
        ]);	
    }
}
