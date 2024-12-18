<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Responsable;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ResponsableType;
use App\Form\ResponsableModifierType;

class ResponsableController extends AbstractController {
    public function index(): Response {
        return $this->render('responsable/index.html.twig', [
            'controller_name' => 'ResponsableController',
        ]);
    }

    public function lister(ManagerRegistry $doctrine) {
        $responsables = $doctrine->getRepository(Responsable::class)->findAll();

        return $this->render('responsable/lister.html.twig', [
            'pResponsables' => $responsables,
        ]);	
    }
    
    public function consulter(ManagerRegistry $doctrine, int $id){
        $responsable= $doctrine->getRepository(Responsable::class)->find($id);

        if (!$responsable) {
            throw $this->createNotFoundException(
            'Aucun responsable trouvé avec le numéro '.$id
            );
        }

        return $this->render('responsable/consulter.html.twig', [
            'responsable' => $responsable,
        ]);
    }

    public function ajouter(ManagerRegistry $doctrine, Request $request) {
        $responsable = new responsable();
	    $form = $this->createForm(ResponsableType::class, $responsable);
	    $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $responsable = $form->getData();

            $entityManager = $doctrine->getManager();
            $entityManager->persist($responsable);
            $entityManager->flush();

            return $this->render('responsable/consulter.html.twig', ['responsable' => $responsable,]);
        }
        else {
            return $this->render('responsable/ajouter.html.twig', array('form' => $form->createView(),));
        }
    }

    public function modifier(Request $request, ManagerRegistry $doctrine, $id)
    {
		$responsable= $doctrine->getRepository(Responsable::class)->find($id);

		if (!$responsable) {
            throw $this->createNotFoundException('Aucun étudiant trouvé avec le numéro '.$id);
        }
        else {
            $form = $this->createForm(ResponsableModifierType::class, $responsable);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $responsable = $form->getData();
                $entityManager = $doctrine->getManager();
                $entityManager->persist($responsable);
                $entityManager->flush();

                return $this->render('responsable/consulter.html.twig', array(
                    'responsable' => $responsable,
                ));
            }
            else {
                return $this->render('responsable/modifier.html.twig', array(
                    'form' => $form->createView(),
                ));
            }
        }
	}

    public function supprimer(ManagerRegistry $doctrine, int $id): Response {
        $responsable = $doctrine->getRepository(Responsable::class)->find($id);

        if (!$responsable) {
            throw $this->createNotFoundException('Aucune responsable trouvé avec l\'ID '.$id);
        }

        $entityManager = $doctrine->getManager();
        $entityManager->remove($responsable); 
        $entityManager->flush();

        return $this->redirectToRoute('app_responsable_lister');
    }

}