<?php

namespace App\Controller;

use App\Form\MetierModifierType;
use App\Form\MetierType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Metier;
use Symfony\Component\HttpFoundation\Request;

class MetierController extends AbstractController
{     
    // #[Route('/metier', name: 'app_metier')]
    public function index(): Response
    {
        return $this->render('metier/index.html.twig', [
            'controller_name' => 'MetierController',
        ]);
    }

    public function lister(ManagerRegistry $doctrine)
    {
        $metiers = $doctrine->getRepository(Metier::class)->findAll();

        return $this->render('metier/lister.html.twig', [
            'pMetiers' => $metiers,
        ]);
    }

    public function consulter(ManagerRegistry $doctrine, int $id)
    {
        $metier = $doctrine->getRepository(Metier::class)->find($id);

        if (!$metier) {
            throw $this->createNotFoundException(
                'Aucun metier trouvé avec le numéro ' . $id
            );
        }

        return $this->render('metier/consulter.html.twig', [
            'metier' => $metier,
        ]);
    }

    public function ajouter(ManagerRegistry $doctrine, Request $request)
    {
        $metier = new metier();
        $form = $this->createForm(MetierType::class, $metier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $metier = $form->getData();

            $entityManager = $doctrine->getManager();
            $entityManager->persist($metier);
            $entityManager->flush();

            return $this->render('metier/consulter.html.twig', ['metier' => $metier,]);
        } else {
            return $this->render('metier/ajouter.html.twig', array('form' => $form->createView(), ));
        }
    }

    public function modifier(ManagerRegistry $doctrine, $id, Request $request)
    {
        $metier = $doctrine->getRepository(Metier::class)->find($id);
    
        if (!$metier) {
            throw $this->createNotFoundException('Aucun metier trouvé avec le numéro ' . $id);
        }
    
        $form = $this->createForm(MetierModifierType::class, $metier);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $metier = $form->getData();
    
            $entityManager = $doctrine->getManager();
    
            $entityManager->persist($metier);
            $entityManager->flush();
    
            return $this->render('metier/consulter.html.twig', [
                'metier' => $metier,
            ]);
        }
    
        return $this->render('metier/modifier.html.twig', [
            'form' => $form->createView(),
            'metier' => $metier,
        ]);
    }
    

    public function supprimer(ManagerRegistry $doctrine, int $id): Response
    {
        $metier = $doctrine->getRepository(Metier::class)->find($id);

        if (!$metier) {
            throw $this->createNotFoundException('Aucun metier trouvé avec l\'ID ' . $id);
        }

        $entityManager = $doctrine->getManager();
        $entityManager->remove($metier);
        $entityManager->flush();

        return $this->redirectToRoute('app_metier_lister');
    }
}