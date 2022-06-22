<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnnonceProvisoireController extends AbstractController
{
    #[Route('/annonce/provisoire', name: 'app_annonce_provisoire')]
    public function index(): Response
    {
        return $this->render('annonce_provisoire/index.html.twig', [
            'controller_name' => 'AnnonceProvisoireController',
        ]);
    }
}
