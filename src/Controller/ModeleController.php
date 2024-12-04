<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Modele; 
use Symfony\Component\HttpFoundation\Request;

class ModeleController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('modele/index.html.twig', [
            'controller_name' => 'ModeleController',
        ]);
    }
    public function lister(ManagerRegistry $doctrine)
    {
        $modele = $doctrine->getRepository(Modele::class)->findAll();

        return $this->render('modele/lister.html.twig', [
            'pmodele' => $modele,
        ]);	
    }
}
