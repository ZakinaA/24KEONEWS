<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Cours;


class CoursController extends AbstractController
{
//    #[Route('/cours', name: 'app_cours')]
    public function index(): Response
    {
        return $this->render('cours/index.html.twig', [
            'controller_name' => 'CoursController',
        ]);
    }

    public function lister(ManagerRegistry $doctrine){

        $repository = $doctrine->getRepository(Cours::class);
        $cours= $repository->findAll();

        return $this->render('cours/lister.html.twig', [
            'pCours' => $cours,
        ]);	
        
    }

    public function consulter(ManagerRegistry $doctrine, int $id){

        $cours= $doctrine->getRepository(Cours::class)->find($id);

        if (!$cours) {
            throw $this->createNotFoundException(
            'Aucun élève trouvé avec le numéro '.$id
            );
        }

        //return new Response('Cours : '.$cours->getNom());
        return $this->render('cours/consulter.html.twig', [
            'cours' => $cours,]);
    }
}
