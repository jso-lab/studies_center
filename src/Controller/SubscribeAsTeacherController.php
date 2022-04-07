<?php

namespace App\Controller;

use App\Entity\Teacher;
use App\Form\SubscribeAsTeacherType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
;

class SubscribeAsTeacherController extends AbstractController
{
    #[Route('/subscribe/as/teacher', name: 'app_subscribe_as_teacher')]

   
    public function new( UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $em, Request $request) : Response
    {   
        $teacher = new Teacher();

        $form = $this->createForm(SubscribeAsTeacherType::class, $teacher);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $teacher->setPassword(
                $userPasswordHasher->hashPassword(
                       $teacher,
                       $form->get('password')->getData()
                    )
                ); 
            $em->persist($teacher);
            $em->flush();

            return $this->redirectToRoute('app_form_validated');
        }
        return $this->renderForm('subscribe_as_teacher/index.html.twig', [
            'form' => $form,
        ]);
     
    }
    #[Route('/login', name: 'app_login')]
    public function login() 
    {
        return $this->render('login/index.html.twig');
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout() {}
}
