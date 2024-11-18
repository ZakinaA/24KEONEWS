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

    public function lister(ManagerRegistry $doctrine)
    {
        $interventions = $doctrine->getRepository(Intervention::class)->findAll();

        return $this->render('intervention/lister.html.twig', [
            'pInterventions' => $interventions,
        ]);	
    }

    public function consulter(ManagerRegistry $doctrine, int $id)
    {
        $intervention = $doctrine->getRepository(intervention::class)->find($id);

        if (!$intervention) {
            throw $this->createNotFoundException(
                'Aucune intervention trouvé avec le numéro '.$id
            );
        }
        
        return $this->render('intervention/consulter.html.twig', [
            'intervention' => $intervention,
        ]);
    }
}
