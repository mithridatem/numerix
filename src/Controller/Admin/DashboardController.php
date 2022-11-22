<?php

namespace App\Controller\Admin;
use App\Entity\Admin;
use App\Entity\Administrateur;
use App\Entity\Former;
use App\Entity\Trainee;
use App\Entity\RequestContact;
use App\Entity\RequestType;
use App\Entity\Session;
use App\Entity\Skill;
use App\Entity\TypeFormer;
use App\Entity\TypeSession;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

class DashboardController extends AbstractDashboardController
{
    //routage dynamique
    #[Route('/enigma', name: 'enigma')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
        ->setController(SessionCrudController::class)
        ->generateUrl();
        return $this->redirect($url);

    }
    //configuration du dashboard
    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Numerix');
    }

    //configuration du menu
    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        //yield MenuItem::linkToRoute('Retour à l\'accueil', 'fa fa-home', 'app_accueil');
        yield MenuItem::linkToCrud('Admin', 'fa fa-user-plus', Admin::class);
        yield MenuItem::linkToCrud('Formateur', 'fa fa-address-card', Former::class);
        yield MenuItem::linkToCrud('Filère Formateur', 'fa fa-file-text-o', TypeFormer::class);
        yield MenuItem::linkToCrud('Contact', 'fa fa-envelope', RequestContact::class);
        yield MenuItem::linkToCrud('Type contact', 'fa fa-bars', RequestType::class);
        yield MenuItem::linkToCrud('Session', 'fa fa-users', Session::class);
        yield MenuItem::linkToCrud('Filière Session', 'fa fa-list-ul', TypeSession::class);
        yield MenuItem::linkToCrud('Compétence', 'fa fa-thumbs-up', Skill::class);
        yield MenuItem::linkToCrud('Stagiaire', 'fa fa-user-o', Trainee::class);
    }
    //constructeur
    public function __construct(private AdminUrlGenerator $adminUrlGenerator){}
}
