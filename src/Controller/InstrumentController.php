<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Instrument;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;

class InstrumentController extends AbstractController
{
    //#[Route('/instrument', name: 'app_instrument')]
    public function index(): Response
    {
        return $this->render('instrument/index.html.twig', [
            'controller_name' => 'InstrumentController',
        ]);
    }

    public function lister(ManagerRegistry $doctrine)
    {
        $instrument = $doctrine->getRepository(Instrument::class)->findAll();

        return $this->render('instrument/lister.html.twig', [
            'pInstrument' => $instrument,
        ]);	
    }

    public function consulter(ManagerRegistry $doctrine, int $id)
    {
        $instrument = $doctrine->getRepository(Instrument::class)->find($id);

        if (!$instrument) {
            throw $this->createNotFoundException(
                'Aucun étudiant trouvé avec le numéro '.$id
            );
        }
        
        return $this->render('instrument/consulter.html.twig', [
            'instrument' => $instrument,
        ]);
    }
}
