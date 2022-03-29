<?php

namespace App\Controller\Admin;


use App\Entity\Teacher;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{

    public function __construct(private AdminUrlGenerator $adminUrlGenerator)
    {

    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
            ->setController(TeacherCrudController::class)
            ->generateUrl();
        return $this->redirect($url);

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            // the name visible to end users
            ->setTitle('Eco IT - Admin Center');
    }
    public function configureMenuItems(): iterable
    {
        
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::subMenu('Teachers', 'fa fa-align-justify')->setSubItems([
            MenuItem::linkToCrud('Create Teacher', 'fas fa-plus', Teacher::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Teacher', 'fas fa-eye', Teacher::class)
        ]);
        yield MenuItem::subMenu('Messages', 'fa fa-envelope')->setSubItems([
         MenuItem::linkToCrud('Create message', 'fas fa-plus', Lesson::class)->setAction(Crud::PAGE_NEW),
         MenuItem::linkToCrud('Show messages', 'fas fa-eye', Lesson::class)
        ]);
        yield MenuItem::section('Settings', 'fa fa-gear');
    }
}