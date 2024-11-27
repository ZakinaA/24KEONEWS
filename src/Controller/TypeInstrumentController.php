<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\TypeInstrument; 
use Symfony\Component\HttpFoundation\Request;

class TypeInstrumentController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('type_instrument/index.html.twig', [
            'controller_name' => 'TypeInstrumentController',
        ]);
    }
    public function lister(ManagerRegistry $doctrine)
    {
        $typeinstrument = $doctrine->getRepository(TypeInstrument::class)->findAll();

        return $this->render('type_instrument/lister.html.twig', [
            'pTypeInstrument' => $typeinstrument,
        ]);	
    }
}
