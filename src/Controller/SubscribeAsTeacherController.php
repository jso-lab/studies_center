<?php

namespace App\Controller;

use App\Entity\Teacher;
use App\Form\SubscribeAsTeacherType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SubscribeAsTeacherController extends AbstractController
{
    #[Route('/subscribe/as/teacher', name: 'app_subscribe_as_teacher')]

    public function new( EntityManagerInterface $em, Request $request) : Response
    {   
        $teacher = new Teacher();
        
        $form = $this->createForm(SubscribeAsTeacherType::class, $teacher);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           $form->getData();
        

            $teacher->setFirstName('firstName');
            $teacher->setLastName('lastName');
            $teacher->setEmail('email');
            $teacher->setPassword('password');
            $teacher->setProfilPicture('profilPicture');
            $teacher->setPresentation('presentation');
            

            $em->persist($teacher);
            $em->flush();

            return $this->redirectToRoute('app_form_validated');
        }

        return $this->renderForm('subscribe_as_teacher/index.html.twig', [
            'form' => $form,
        ]);
    }
}
