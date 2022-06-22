<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilUtilisateurController extends AbstractController
{
    #[Route('/accueil/utilisateur', name: 'app_accueil_utilisateur')]
    public function index(): Response
    {
        return $this->render('accueil_utilisateur/index.html.twig', [
            'controller_name' => 'AccueilUtilisateurController',
        ]);
    }
}
