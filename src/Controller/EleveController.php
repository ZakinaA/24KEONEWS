<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Eleve;
use Symfony\Component\HttpFoundation\Request;
use App\Form\EleveType;
use App\Form\EleveModifierType;

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

    public function ajouter(ManagerRegistry $doctrine, Request $request) {
        $eleve = new eleve();
	    $form = $this->createForm(EleveType::class, $eleve);
	    $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
    
            $eleve = $form->getData();
    
            $entityManager = $doctrine->getManager();
            $entityManager->persist($eleve);
            $entityManager->flush();
    
            $responsable=$eleve->getResponsable();

            return $this->render('eleve/consulter.html.twig', [
                'eleve' => $eleve,
                'responsable' => $responsable,
            ]);
        }
        else {
            return $this->render('eleve/ajouter.html.twig', array('form' => $form->createView(),));
        }
    }

    public function modifier(Request $request, ManagerRegistry $doctrine, $id) {
		$eleve= $doctrine->getRepository(Eleve::class)->find($id);
 
		if (!$eleve) {
            throw $this->createNotFoundException('Aucun étudiant trouvé avec le numéro '.$id);
        }
        else {
            $form = $this->createForm(EleveModifierType::class, $eleve);
            $form->handleRequest($request);
    
            if ($form->isSubmitted() && $form->isValid()) {
                $eleve = $form->getData();
                $entityManager = $doctrine->getManager();
                $entityManager->persist($eleve);
                $entityManager->flush();
            
                $responsable=$eleve->getResponsable();

                return $this->render('eleve/consulter.html.twig', [
                    'eleve' => $eleve,
                    'responsable' => $responsable,
                ]);
            }
            else {
                return $this->render('eleve/modifier.html.twig', array(
                    'form' => $form->createView(),
                ));
            }
        }
	}

    public function supprimer(ManagerRegistry $doctrine, int $id): Response {
        $eleve = $doctrine->getRepository(Eleve::class)->find($id);

        if (!$eleve) {
            throw $this->createNotFoundException('Aucune eleve trouvé avec l\'ID '.$id);
        }

        $entityManager = $doctrine->getManager();
        $entityManager->remove($eleve); 
        $entityManager->flush();

        return $this->redirectToRoute('app_eleve_lister');
    }
}