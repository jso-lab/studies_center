<?php

namespace App\Controller;

use App\Entity\Student;
use App\Form\BecomeStudentType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class BecomeStudentController extends AbstractController
{
    #[Route('/become/student', name: 'app_become_student')]

    public function index(EntityManagerInterface $em, Request $request, UserPasswordHasherInterface $userPasswordHasher) : Response
    {
        $student = new Student();
        
        $form = $this->createForm(BecomeStudentType::class, $student);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
          
            $student->setPassword(
                $userPasswordHasher->hashPassword(
                        $student,
                        $form->get('plainPassword')->getData()
                )
                );
            $em->persist($student);
            $em->flush();

            return $this->redirectToRoute('app_form_validated');
        }
        return $this->renderForm('become_student/index.html.twig', [
            'form' => $form,
        ]);
    }
}
