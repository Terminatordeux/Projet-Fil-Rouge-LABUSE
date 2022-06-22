<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AnnonceprovisoireRepository;
class AccueilController extends AbstractController
{
    #[Route('/accueil', name: 'app_accueil')]
    public function index(AnnonceprovisoireRepository $annonceprovisoireRepository): Response
    {
        $annonces = $annonceprovisoireRepository->findAll();
        return $this->render('accueil/index.html.twig', [
            'Annonces' => $annonces
        ]);
        
    }
 
    
}
