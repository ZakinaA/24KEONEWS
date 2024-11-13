<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Eleve;

class EleveController extends AbstractController
{
    public function lister(ManagerRegistry $doctrine) {
        $eleves = $doctrine->getRepository(Eleve::class)->findAll();

        return $this->render('eleve/lister.html.twig', [
            'pEleves' => $eleves,
        ]);	
    }

    public function index(): Response {
        return $this->render('eleve/index.html.twig', [
            'controller_name' => 'EleveController',
        ]);
    }
}
