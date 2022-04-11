<?php

namespace App\Controller;

use App\Entity\Course;
use App\Repository\CoursesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[IsGranted('ROLE_USER')]

class CoursesController extends AbstractController
{
    #[Route('/courses', name: 'app_courses',  methods: ['GET'])]
   
    public function index(CoursesRepository $coursesRepository): Response
    {
        return $this->render('courses/index.html.twig', [
            'controller_name' => 'CoursesController',
            'courses' => $coursesRepository->findAll(),
        ]);
    }
}
