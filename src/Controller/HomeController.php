<?php

namespace App\Controller;

use App\Repository\CoursesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController 

{
    #[Route('/', name: 'app_home')]

    public function index(CoursesRepository $coursesRepository, $limit = 3): Response
    {
        return $this->render('Home/home.html.twig', [
           
            //On affiche que les trois dernères formation
            'courses' => $coursesRepository->findBy([], ['id' => 'DESC'], $limit),
            
        ]);
     
    }
}