<?php

namespace App\Controller\Admin;


use App\Entity\Teacher;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Controller\TeacherCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{

    public function __construct(private AdminUrlGenerator $adminUrlGenerator)
    {
        $this->container->get(AdminUrlGenerator::class);

        if ('john' === $this->Teacher::class->getEmail()) {
            return $this->redirect($adminUrlGenerator->setController(TeacherCrudController::class)->generateUrl());
        }
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
        return [
                MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),
                MenuItem::subMenu('Teachers', 'fa fa-align-justify')->setSubItems([
                MenuItem::linkToCrud('Create Teacher', 'fas fa-plus', Teacher::class)->setAction(Crud::PAGE_NEW),
                MenuItem::linkToCrud('Show Teachers', 'fas fa-eye', Teacher::class)
            ]),
                MenuItem::subMenu('Messages', 'fa fa-envelope')->setSubItems([
                MenuItem::section('Create message', 'fas fa-plus'),
                MenuItem::section('Show messages', 'fas fa-eye')
            ]),
                MenuItem::section('Settings', 'fa fa-gear')
        ];
       
    }
}