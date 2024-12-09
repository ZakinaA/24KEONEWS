<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\QuotientFamilial;
use App\Form\QuotientFamilialType;
use Symfony\Component\HttpFoundation\Request;

class QuotientFamilialController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('quotient_familial/index.html.twig', [
            'controller_name' => 'QuotientFamilialController',
        ]);
    }

    public function lister(ManagerRegistry $doctrine) {
        $quotient_familiaux = $doctrine->getRepository(QuotientFamilial::class)->findAll();

        return $this->render('quotient_familial/lister.html.twig', [
            'pQuotient_familiaux' => $quotient_familiaux,
        ]);	
    }

    public function consulter(ManagerRegistry $doctrine, int $id) {
        $quotient_familial= $doctrine->getRepository(QuotientFamilial::class)->find($id);

        if (!$quotient_familial) {
            throw $this->createNotFoundException(
            'Aucun quotient familial trouvé avec le numéro '.$id
            );
        }

        return $this->render('quotient_familial/consulter.html.twig', [
            'quotient_familial' => $quotient_familial,
        ]);
    }

    public function ajouter(ManagerRegistry $doctrine, Request $request)
    {
        $quotient_familial = new QuotientFamilial();
        $form = $this->createForm(QuotientFamilialType::class, $quotient_familial);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $quotient_familial = $form->getData();

            $entityManager = $doctrine->getManager();
            $entityManager->persist($quotient_familial);
            $entityManager->flush();

            return $this->render('quotient_familial/consulter.html.twig', [
                'quotient_familial' => $quotient_familial,
            ]);
        }
        else {
            return $this->render('quotient_familial/ajouter.html.twig', array(
                'form' => $form->createView(),
            ));
        }
    }
}
