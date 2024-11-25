<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Cours;
use Symfony\Component\HttpFoundation\Request;
use App\Form\CoursType;
use App\Form\CoursModifierType;


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
            'Aucun cours trouvé avec le numéro '.$id
            );
        }

            $jour = $cours->getJour(); 

            return $this->render('cours/consulter.html.twig', [
                'cours' => $cours,
                'jour' => $jour, 
            ]);
        }
    
    public function ajouter(ManagerRegistry $doctrine,Request $request){
        $cours = new cours();
	$form = $this->createForm(CoursType::class, $cours);
	$form->handleRequest($request);
 
	if ($form->isSubmitted() && $form->isValid()) {
 
            $cours = $form->getData();
 
            $entityManager = $doctrine->getManager();
            $entityManager->persist($cours);
            $entityManager->flush();
 
	    return $this->render('cours/consulter.html.twig', ['cours' => $cours,]);
	}
	else
        {
            return $this->render('cours/ajouter.html.twig', array('form' => $form->createView(),));
	}
}

public function modifier(ManagerRegistry $doctrine, $id, Request $request){
 
    $cours = $doctrine->getRepository(Cours::class)->find($id);
 
	if (!$cours) {
	    throw $this->createNotFoundException('Aucun cours trouvé avec le numéro '.$id);
	}

	else
	{
            $form = $this->createForm(CoursModifierType::class, $cours);
            $form->handleRequest($request);
 
            if ($form->isSubmitted() && $form->isValid()) {
 
                 $cours = $form->getData();
                 $entityManager = $doctrine->getManager();
                 $entityManager->persist($cours);
                 $entityManager->flush();
                 return $this->render('cours/consulter.html.twig', ['cours' => $cours,]);
           }
           else{
                return $this->render('cours/modifier.html.twig', array('form' => $form->createView(),));
           }
        }
 }

 public function supprimer(ManagerRegistry $doctrine, int $id): Response
 {
     $cours = $doctrine->getRepository(Cours::class)->find($id);

     if (!$cours) {
         throw $this->createNotFoundException('Aucune cours trouvé avec l\'ID '.$id);
     }

     $entityManager = $doctrine->getManager();
     $entityManager->remove($cours); 
     $entityManager->flush();

     return $this->redirectToRoute('app_cours_lister');
 }

}
