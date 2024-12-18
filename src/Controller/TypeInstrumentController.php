<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\TypeInstrument; 
use Symfony\Component\HttpFoundation\Request;
use App\Form\TypeInstrumentType;
use App\Form\TypeInstrumentModifierType;

class TypeInstrumentController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('type_instrument/index.html.twig', [
            'controller_name' => 'TypeInstrumentController',
        ]);
    }
    public function lister(ManagerRegistry $doctrine)
    {
        $typeinstrument = $doctrine->getRepository(TypeInstrument::class)->findAll();

        return $this->render('type_instrument/lister.html.twig', [
            'pTypeInstrument' => $typeinstrument,
        ]);	
    }
    public function consulter(ManagerRegistry $doctrine, int $id)
    {
        $typeinstrument = $doctrine->getRepository(TypeInstrument::class)->find($id);

        if (!$typeinstrument) {
            throw $this->createNotFoundException(
                'Aucun étudiant trouvé avec le numéro '.$id
            );
        }
        
        return $this->render('type_instrument/consulter.html.twig', [
            'typeInstrument' => $typeinstrument,
        ]);
    }

    public function ajouter(Request $request, ManagerRegistry $doctrine): Response
    {
        $typeinstrument = new typeinstrument();
        $form = $this->createForm(TypeInstrumentType::class, $typeinstrument);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $doctrine->getManager();
            $entityManager->persist($typeinstrument);
            $entityManager->flush();

            return $this->render('type_instrument/consulter.html.twig', [
                'typeInstrument' => $typeinstrument,
            ]);
        }

        return $this->render('type_instrument/ajouter.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function modifier(Request $request, ManagerRegistry $doctrine, $id)
    {
		$typeinstrument= $doctrine->getRepository(TypeInstrument::class)->find($id);
 
		if (!$typeinstrument)
        {
            throw $this->createNotFoundException('Aucun typeinstrument trouvé avec le numéro '.$id);
        }
        else
        {
            $form = $this->createForm(TypeInstrumentModifierType::class, $typeinstrument);
            $form->handleRequest($request);
    
            if ($form->isSubmitted() && $form->isValid())
            {
                $typeinstrument = $form->getData();
                $entityManager = $doctrine->getManager();
                $entityManager->persist($typeinstrument);
                $entityManager->flush();
            
                return $this->render('type_instrument/consulter.html.twig', array(
                    'typeInstrument' => $typeinstrument,
                ));
            }
            else
            {
                return $this->render('type_instrument/ajouter.html.twig', array(
                    'form' => $form->createView(),
                ));
            }
        }
	}

    public function supprimer(ManagerRegistry $doctrine, int $id): Response
    {
        $typeinstrument = $doctrine->getRepository(TypeInstrument::class)->find($id);
   
        if (!$typeinstrument) {
            throw $this->createNotFoundException('Aucune typeinstrument trouvé avec l\'ID '.$id);
        }
   
        $entityManager = $doctrine->getManager();
        $entityManager->remove($typeinstrument); 
        $entityManager->flush();
   
        return $this->redirectToRoute('app_typeinstrument_lister');
    }
}
