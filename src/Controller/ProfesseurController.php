<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Professeur;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Form\InstrumentFormType;
use App\Form\InstrumentModifierType;
class ProfesseurController extends AbstractController
{
    #[Route('/professeur', name: 'app_professeur')]
    public function index(): Response
    {
        return $this->render('professeur/index.html.twig', [
            'controller_name' => 'ProfesseurController',
        ]);
    }
    public function lister(ManagerRegistry $doctrine)
    {
        $professeur = $doctrine->getRepository(Professeur::class)->findAll();

        return $this->render('professeur/lister.html.twig', [
            'pProfesseur' => $professeur,
        ]);	
    }
}
