<?php

namespace App\Controller\Teacher;


use App\Entity\Course;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TeacherController extends AbstractDashboardController
{

    public function __construct(private AdminUrlGenerator $adminUrlGenerator)
    {
    
    }

    #[Route('/teacher', name: 'teacher')]
   
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
        ->setController(CourseCrudController::class)
        ->generateUrl();
        return $this->redirect($url);

    }
    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            // the name visible to end users
            ->setTitle('Eco IT - Espace Instructeur');
    }
    public function configureMenuItems(): iterable
    {
        
       
           yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
           yield MenuItem::subMenu('Formation', 'fa fa-align-justify')->setSubItems([
               MenuItem::linkToCrud('Create Course', 'fas fa-plus', Course::class)->setAction(Crud::PAGE_NEW),
               MenuItem::linkToCrud('Show Courses', 'fas fa-eye', Course::class)
           ]);
           
           
    }

}
