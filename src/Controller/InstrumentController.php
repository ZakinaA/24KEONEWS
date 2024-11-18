<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Instrument;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Form\InstrumentFormType;
use App\Form\InstrumentModifierType;



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

    public function ajouter(Request $request, ManagerRegistry $doctrine): Response
    {
        $instrument = new Instrument();
        $form = $this->createForm(InstrumentFormType::class, $instrument);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $doctrine->getManager();
            $entityManager->persist($instrument);
            $entityManager->flush();

            return $this->render('instrument/consulter.html.twig', [
                'instrument' => $instrument,
            ]);
        }

        return $this->render('instrument/ajouter.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function modifier(Request $request, ManagerRegistry $doctrine, $id)
    {
		$instrument= $doctrine->getRepository(Instrument::class)->find($id);
 
		if (!$instrument)
        {
            throw $this->createNotFoundException('Aucun instrument trouvé avec le numéro '.$id);
        }
        else
        {
            $form = $this->createForm(InstrumentModifierType::class, $instrument);
            $form->handleRequest($request);
    
            if ($form->isSubmitted() && $form->isValid())
            {
                $instrument = $form->getData();
                $entityManager = $doctrine->getManager();
                $entityManager->persist($instrument);
                $entityManager->flush();
            
                return $this->render('instrument/consulter.html.twig', array(
                    'instrument' => $instrument,
                ));
            }
            else
            {
                return $this->render('instrument/ajouter.html.twig', array(
                    'form' => $form->createView(),
                ));
            }
        }
	}
}
