<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Responsable;

class ResponsableController extends AbstractController {
    public function index(): Response {
        return $this->render('responsable/index.html.twig', [
            'controller_name' => 'ResponsableController',
        ]);
    }

    public function lister(ManagerRegistry $doctrine) {
        $responsables = $doctrine->getRepository(Responsable::class)->findAll();

        return $this->render('responsable/lister.html.twig', [
            'pResponsables' => $responsables,
        ]);	
    }
    
}