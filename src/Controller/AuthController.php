<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('security/auth/index.html.twig', [
            'controller_name' => 'AuthController',
        ]);
    }
}
