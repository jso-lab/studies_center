<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BecomeStudentController extends AbstractController
{
    #[Route('/become/student', name: 'app_become_student')]
    public function index(): Response
    {
        return $this->render('become_student/index.html.twig', [
            'controller_name' => 'BecomeStudentController',
        ]);
    }
}
