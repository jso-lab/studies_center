<?php

namespace App\Controller;

use App\Entity\Teacher;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SubscribeAsTeacherController extends AbstractController
{
    #[Route('/subscribe/as/teacher', name: 'app_subscribe_as_teacher')]
    public function indec(): Response
    {   
       
        return $this->render('subscribe_as_teacher/index.html.twig', [
            'controller_name' => 'SubscribeAsTeacherController',
        ]);
    }
}
