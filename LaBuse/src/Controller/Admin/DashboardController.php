<?php

namespace App\Controller\Admin;
use App\Entity\Annonce;
use App\Entity\Utilisateur;
use App\Entity\Adresse;
use App\Entity\Dept;
use App\Entity\Etat;
use App\Entity\Marque;
use App\Entity\Message;
use App\Entity\Photo;
use App\Entity\Technologie;
use App\Entity\Type;
use App\Entity\Annonceprovisoire;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use App\Controller\Admin\AnnonceCrudController;


class DashboardController extends AbstractDashboardController
{
    // constructeur d'url
    public function __construct(private AdminUrlGenerator $AdminUrlGenerator){}

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this-> AdminUrlGenerator
        ->setController(AnnonceCrudController::class)
        ->generateUrl();
        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Administrateur des Annonces');
    }
    //Menu d'accès au Crud Administrateur
    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Retour à l\'accueil', 'fa fa-home', 'app_accueil');
        yield MenuItem::linkToCrud('Utilisateur', 'fas fa-meh', Utilisateur::class);
        yield MenuItem::linkToCrud('Annonce', 'fas fa-clipboard-list', Annonce::class);
        yield MenuItem::linkToCrud('Etat', 'fas fa-first-aid', Etat::class);
        yield MenuItem::linkToCrud('Adresses', 'fas fa-shipping-fast', Adresse::class);
        yield MenuItem::linkToCrud('Type', 'fas fa-slideshare', Type::class);
        yield MenuItem::linkToCrud('Technologie', 'fas fa-paper-plane', Technologie::class);
        yield MenuItem::linkToCrud('Photo', 'far fa-id-card', Photo::class);
        yield MenuItem::linkToCrud('Message', 'fas fa-mail-bulk', Message::class);
        yield MenuItem::linkToCrud('Marque', 'fab fa-docker', Marque::class);
        yield MenuItem::linkToCrud('Departement', 'fas fa-map-marked', Dept::class);
        yield MenuItem::linkToCrud('Annonces Provisoires', 'fas fa-beer ', Annonceprovisoire::class);
    }
}

