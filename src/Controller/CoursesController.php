<?php

namespace App\Controller;

use App\Repository\CoursesRepository;
use App\Repository\IllustrationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[IsGranted('ROLE_USER')]

class CoursesController extends AbstractController
{
    #[Route('/courses', name: 'app_courses',  methods: ['GET'])]
   
    public function index(CoursesRepository $coursesRepository, IllustrationRepository $illustrationsRepository, $limit = 3): Response
    {
        return $this->render('courses/index.html.twig', [
            'controller_name' => 'CoursesController',
            //On affiche toutes les formations
            'courses' => $coursesRepository->findAll(),
            //On affiche également les illustrations qui accompagnent
            'illustrations' => $illustrationsRepository->findAll()
        ]);
    }
}
