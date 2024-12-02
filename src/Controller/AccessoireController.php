<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Accessoire; 
use Symfony\Component\HttpFoundation\Request;

class AccessoireController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('accessoire/index.html.twig', [
            'controller_name' => 'AccessoireController',
        ]);
    }
    public function lister(ManagerRegistry $doctrine)
    {
        $accessoire = $doctrine->getRepository(Accessoire::class)->findAll();

        return $this->render('accessoire/lister.html.twig', [
            'paccessoire' => $accessoire,
        ]);	
    }
}
