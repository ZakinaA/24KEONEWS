<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Intervention;
use Symfony\Component\HttpFoundation\Request;
use App\Form\InterventionType;
use App\Form\InterventionModifierType;


class InterventionController extends AbstractController
{
    // #[Route('/intervention', name: 'app_intervention')]
    public function index(): Response
    {
        return $this->render('intervention/index.html.twig', [
            'controller_name' => 'InterventionController',
        ]);
    }

    public function lister(ManagerRegistry $doctrine)
    {
        $interventions = $doctrine->getRepository(Intervention::class)->findAll();

        return $this->render('intervention/lister.html.twig', [
            'pInterventions' => $interventions,
        ]);	
    }

    public function consulter(ManagerRegistry $doctrine, int $id)
    {
        $intervention = $doctrine->getRepository(intervention::class)->find($id);

        if (!$intervention) {
            throw $this->createNotFoundException(
                'Aucune intervention trouvé avec le numéro '.$id
            );
        }
        
        return $this->render('intervention/consulter.html.twig', [
            'intervention' => $intervention,
        ]);
    }

    public function ajouter(ManagerRegistry $doctrine,Request $request){
        $intervention = new intervention();
	$form = $this->createForm(interventionType::class, $intervention);
	$form->handleRequest($request);
 
	if ($form->isSubmitted() && $form->isValid()) {
 
            $intervention = $form->getData();
 
            $entityManager = $doctrine->getManager();
            $entityManager->persist($intervention);
            $entityManager->flush();
 
	    return $this->render('intervention/consulter.html.twig', ['intervention' => $intervention,]);
	}
	else
        {
            return $this->render('intervention/ajouter.html.twig', array('form' => $form->createView(),));
	}
    }

    public function modifier(ManagerRegistry $doctrine, $id, Request $request){
 
        //récupération de l'étudiant dont l'id est passé en paramètre
        $intervention = $doctrine->getRepository(Intervention::class)->find($id);
     
        if (!$intervention) {
            throw $this->createNotFoundException('Aucune intervention trouvé avec le numéro '.$id);
        }
        else
        {
                $form = $this->createForm(InterventionModifierType::class, $intervention);
                $form->handleRequest($request);
     
                if ($form->isSubmitted() && $form->isValid()) {
     
                     $intervention = $form->getData();
                     $entityManager = $doctrine->getManager();
                     $entityManager->persist($intervention);
                     $entityManager->flush();
                     return $this->render('intervention/consulter.html.twig', ['intervention' => $intervention,]);
               }
               else{
                    return $this->render('intervention/modifier.html.twig', array('form' => $form->createView(),));
               }
            }
     }

     public function supprimer(ManagerRegistry $doctrine, int $id): Response
     {
         $intervention = $doctrine->getRepository(Intervention::class)->find($id);
 
         if (!$intervention) {
             throw $this->createNotFoundException('Aucune intervention trouvé avec l\'ID '.$id);
         }
 
         $entityManager = $doctrine->getManager();
         $entityManager->remove($intervention); 
         $entityManager->flush();
 
         return $this->redirectToRoute('app_intervention_lister');
     }
     
}
