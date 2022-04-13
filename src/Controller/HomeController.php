<?php

namespace App\Controller;

use App\Repository\CoursesRepository;
use App\Repository\IllustrationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController 

{
    #[Route('/', name: 'app_home')]

    public function index(CoursesRepository $coursesRepository, IllustrationRepository $illustrationsRepository): Response
    {
        return $this->render('home/home.html.twig', [
            'controller_name' => 'HomeController',
            'courses' => $coursesRepository->findAll(),
            'illustrations' => $illustrationsRepository->findOneBy(['name'=>'name'])
        ]);
    }
}