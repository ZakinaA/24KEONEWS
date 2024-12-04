<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuotientFamilialController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('quotient_familial/index.html.twig', [
            'controller_name' => 'QuotientFamilialController',
        ]);
    }
}
