<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Inscription;
use App\Form\InscriptionType;
use App\Entity\Cours;
use App\Entity\Eleve;
use App\Form\InscriptionModifierType;



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
    
        return $this->render('inscription/consulter.html.twig', [
            'inscription' => $inscription,
        ]);
    }

    public function ajouter(ManagerRegistry $doctrine,Request $request){
        $inscription = new inscription();
	$form = $this->createForm(InscriptionType::class, $inscription);
	$form->handleRequest($request);
 
	if ($form->isSubmitted() && $form->isValid()) {
 
            $inscription = $form->getData();
 
            $entityManager = $doctrine->getManager();
            $entityManager->persist($inscription);
            $entityManager->flush();
 
	    return $this->render('inscription/consulter.html.twig', ['inscription' => $inscription,]);
	}
	else
        {
            return $this->render('inscription/ajouter.html.twig', array('form' => $form->createView(),));
	}
}

public function modifier(ManagerRegistry $doctrine, $id, Request $request){
 
    $inscription = $doctrine->getRepository(Inscription::class)->find($id);
 
	if (!$inscription) {
	    throw $this->createNotFoundException('Aucune inscription trouvé avec le numéro '.$id);
	}

	else
	{
            $form = $this->createForm(InscriptionModifierType::class, $inscription);
            $form->handleRequest($request);
 
            if ($form->isSubmitted() && $form->isValid()) {
 
                 $inscription = $form->getData();
                 $entityManager = $doctrine->getManager();
                 $entityManager->persist($inscription);
                 $entityManager->flush();
                 return $this->render('inscription/consulter.html.twig', ['inscription' => $inscription,]);
           }
           else{
                return $this->render('inscription/modifier.html.twig', array('form' => $form->createView(),));
           }
        }
 }

 public function supprimer(ManagerRegistry $doctrine, int $id): Response
 {
     $inscription = $doctrine->getRepository(Inscription::class)->find($id);

     if (!$inscription) {
         throw $this->createNotFoundException('Aucune inscription trouvé avec l\'ID '.$id);
     }

     $entityManager = $doctrine->getManager();
     $entityManager->remove($inscription); 
     $entityManager->flush();

     return $this->redirectToRoute('app_inscription_lister');
 }
    
}
