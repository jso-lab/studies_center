<?php

namespace App\Controller;

use App\Entity\Teacher;
use App\Form\SubscribeAsTeacherType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SubscribeAsTeacherController extends AbstractController
{
    #[Route('/subscribe/as/teacher', name: 'app_subscribe_as_teacher')]

    public function new(Request $request): Response
    {   
        $teacher = new Teacher();
        $form = $this->createForm(SubscribeAsTeacherType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $name = $data['name'];
        }

        return $this->render('subscribe_as_teacher/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
