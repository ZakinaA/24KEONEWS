<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Professionnel;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ProfessionnelType;
use App\Form\ProfessionnelModifierType;

class ProfessionnelController extends AbstractController
{
    // #[Route('/professionnel', name: 'app_professionnel')]
    public function index(): Response
    {
        return $this->render('professionnel/index.html.twig', [
            'controller_name' => 'ProfessionnelController',
        ]);
    }

    public function lister(ManagerRegistry $doctrine)
    {
        $professionnels = $doctrine->getRepository(Professionnel::class)->findAll();

        return $this->render('professionnel/lister.html.twig', [
            'pProfessionnels' => $professionnels,
        ]);	
    }

        public function consulter(ManagerRegistry $doctrine, int $id)
    {
        $professionnel = $doctrine->getRepository(Professionnel::class)->find($id);

        if (!$professionnel) {
            throw $this->createNotFoundException(
                'Aucune professionnel trouvé avec le numéro '.$id
            );
        }
        
        return $this->render('professionnel/consulter.html.twig', [
            'professionnel' => $professionnel,
        ]);
    }
}
