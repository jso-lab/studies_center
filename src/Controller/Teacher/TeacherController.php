<?php

namespace App\Controller\Teacher;


use App\Entity\Course;
use App\Entity\Lesson;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TeacherController extends AbstractDashboardController
{
    #[Route('/teacher', name: 'teacher')]
    public function __construct(private AdminUrlGenerator $adminUrlGenerator)
    {

    }
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
            ->setController(CourseCrudController::class)
            ->generateUrl();
        return $this->redirect($url);

    }
        
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // return $this->render('some/path/my-dashboard.html.twig');
    

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
           yield MenuItem::subMenu('Cours', 'fa fa-envelope')->setSubItems([
            MenuItem::linkToCrud('Create Lesson', 'fas fa-plus', Lesson::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Show Lessons', 'fas fa-eye', Lesson::class)
           ]);
           
    }

}
