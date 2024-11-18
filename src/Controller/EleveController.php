<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Eleve;
use Symfony\Component\HttpFoundation\Request;

class EleveController extends AbstractController
{
    public function index(): Response {
        return $this->render('eleve/index.html.twig', [
            'controller_name' => 'EleveController',
        ]);
    }

    public function lister(ManagerRegistry $doctrine) {
        $eleves = $doctrine->getRepository(Eleve::class)->findAll();

        return $this->render('eleve/lister.html.twig', [
            'pEleves' => $eleves,
        ]);	
    }

    public function consulter(ManagerRegistry $doctrine, int $id){
        $eleve= $doctrine->getRepository(Eleve::class)->find($id);

        if (!$eleve) {
            throw $this->createNotFoundException(
            'Aucun eleve trouvé avec le numéro '.$id
            );
        }

        return $this->render('eleve/consulter.html.twig', [
            'eleve' => $eleve,
        ]);
    }
}
