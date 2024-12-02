<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Inscription;
use App\Entity\Cours;
use App\Entity\Eleve;


class InscriptionController extends AbstractController
{
    #[Route('/inscription', name: 'app_inscription')]
    public function index(): Response
    {
        return $this->render('inscription/index.html.twig', [
            'controller_name' => 'InscriptionController',
        ]);
    }

    public function lister(ManagerRegistry $doctrine){

        $repository = $doctrine->getRepository(Inscription::class);
        $inscription= $repository->findAll();

        return $this->render('inscription/lister.html.twig', [
            'pInscription' => $inscription,
        ]);	
        
    }

    public function consulter(ManagerRegistry $doctrine, int $id): Response
    {
        $inscription = $doctrine->getRepository(Inscription::class)->find($id);
    
        if (!$inscription) {
            throw $this->createNotFoundException(
                'Aucune inscription trouvée avec le numéro ' . $id
            );
        }

        $cours = $inscription->getCours(); 
    
        $eleve = $inscription->getEleve(); 
    
        return $this->render('inscription/consulter.html.twig', [
            'inscription' => $inscription,
            'cours' => $cours,  
            'eleves' => $eleve,
        ]);
    }
    
}
