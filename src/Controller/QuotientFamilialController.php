<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\QuotientFamilial;

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
    
}
