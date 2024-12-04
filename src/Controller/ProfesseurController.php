<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Professeur;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ProfesseurType;
use App\Form\ProfesseurModifierType;
class ProfesseurController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('professeur/index.html.twig', [
            'controller_name' => 'ProfesseurController',
        ]);
    }
    public function lister(ManagerRegistry $doctrine)
    {
        $professeur = $doctrine->getRepository(Professeur::class)->findAll();

        return $this->render('professeur/lister.html.twig', [
            'pProfesseur' => $professeur,
        ]);	
    }
    public function consulter(ManagerRegistry $doctrine, int $id)
    {
        $professeur = $doctrine->getRepository(Professeur::class)->find($id);

        if (!$professeur) {
            throw $this->createNotFoundException(
                'Aucun étudiant trouvé avec le numéro '.$id
            );
        }
        
        return $this->render('professeur/consulter.html.twig', [
            'professeur' => $professeur,
        ]);
    }
    public function ajouter(Request $request, ManagerRegistry $doctrine): Response
    {
        $professeur = new Professeur();
        $form = $this->createForm(ProfesseurType::class, $professeur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $doctrine->getManager();
            $entityManager->persist($professeur);
            $entityManager->flush();

            return $this->render('professeur/consulter.html.twig', [
                'professeur' => $professeur,
            ]);
        }

        return $this->render('professeur/ajouter.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    public function modifier(Request $request, ManagerRegistry $doctrine, $id)
    {
		$professeur= $doctrine->getRepository(Professeur::class)->find($id);
 
		if (!$professeur)
        {
            throw $this->createNotFoundException('Aucun professeur trouvé avec le numéro '.$id);
        }
        else
        {
            $form = $this->createForm(ProfesseurModifierType::class, $professeur);
            $form->handleRequest($request);
    
            if ($form->isSubmitted() && $form->isValid())
            {
                $professeur = $form->getData();
                $entityManager = $doctrine->getManager();
                $entityManager->persist($professeur);
                $entityManager->flush();
            
                return $this->render('professeur/consulter.html.twig', array(
                    'professeur' => $professeur,
                ));
            }
            else
            {
                return $this->render('professeur/ajouter.html.twig', array(
                    'form' => $form->createView(),
                ));
            }
        }
	}
    public function supprimer(ManagerRegistry $doctrine, int $id): Response
    {
        $professeur = $doctrine->getRepository(Professeur::class)->find($id);
   
        if (!$professeur) {
            throw $this->createNotFoundException('Aucune professeur trouvé avec l\'ID '.$id);
        }
   
        $entityManager = $doctrine->getManager();
        $entityManager->remove($professeur); 
        $entityManager->flush();
   
        return $this->redirectToRoute('app_lister_professeur');
    }
}
