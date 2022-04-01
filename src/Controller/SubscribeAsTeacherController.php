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

    public function new( EntityManagerInterface $em, Request $request)
    {   
        
        $form = $this->createForm(SubscribeAsTeacherType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $teacher = new Teacher();

            $teacher->setFirstName($data['firstName']);
            $teacher->setLastName($data['lastName']);
            $teacher->setEmail($data['email']);
            $teacher->setPassword($data['password']);
            $teacher->setProfilPicture($data['profilPicture']);
            $teacher->setPresentation($data['presentaion']);

            $em->persist($teacher);
            $em->flush();

            return $this->redirectToRoute('app_form_validated');
        }

        return $this->renderForm('subscribe_as_teacher/index.html.twig', [
            'form' => $form,
        ]);
    }
}
