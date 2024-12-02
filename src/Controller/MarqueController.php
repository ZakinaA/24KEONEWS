<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Marque; 
use Symfony\Component\HttpFoundation\Request;

class MarqueController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('marque/index.html.twig', [
            'controller_name' => 'MarqueController',
        ]);
    }
    public function lister(ManagerRegistry $doctrine)
    {
        $marque = $doctrine->getRepository(Marque::class)->findAll();

        return $this->render('marque/lister.html.twig', [
            'pmarque' => $marque,
        ]);	
    }
}
