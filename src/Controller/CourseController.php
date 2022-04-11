<?php

namespace App\Controller;

use App\Entity\Course;
use App\Form\CourseType;
use App\Repository\CoursesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[IsGranted('ROLE_TEACHER')]
#[Route('/course')]
class CourseController extends AbstractController
{
    #[Route('/', name: 'app_course_index', methods: ['GET'])]
    public function index(CoursesRepository $coursesRepository): Response
    {
        return $this->render('course/index.html.twig', [
            'courses' => $coursesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_course_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CoursesRepository $coursesRepository, SluggerInterface $slugger): Response
    {
        $course = new Course();
        $form = $this->createForm(CourseType::class, $course);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $illustration = $form->get('illustration')->getData();

            if ($illustration) {
                $originalFilename = pathinfo($illustration->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$illustration->guessExtension();

   
                try {
                    $illustration->move(
                        $this->getParameter('repertoire_illustrations'),
                        $newFilename
                    );
                } catch (FileException $e) {
                   $e = 'Un problème est survenu...';
                }

               
                $course->setIllustration($newFilename)
                ;
            }

            $coursesRepository->add($course);
            return $this->redirectToRoute('app_course_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('course/new.html.twig', [
            'Aperçu de la formation' => $course,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_course_show', methods: ['GET'])]
    public function show(Course $course): Response
    {
        return $this->render('course/show.html.twig', [
            'course' => $course,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_course_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Course $course, CoursesRepository $coursesRepository, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(CourseType::class, $course);
        $form->handleRequest($request);

        $illustration = $form->get('illustration')->getData();

        if ($illustration) {
            $originalFilename = pathinfo($illustration->getClientOriginalName(), PATHINFO_FILENAME);
            $safeFilename = $slugger->slug($originalFilename);
            $newFilename = $safeFilename.'-'.uniqid().'.'.$illustration->guessExtension();


            try {
                $illustration->move(
                    $this->getParameter('repertoire_illustrations'),
                    $newFilename
                );
            } catch (FileException $e) {
               $e = 'Un problème est survenu...';
            }

           
            $course->setIllustration($newFilename)
            ;
        }

        if ($form->isSubmitted() && $form->isValid()) {
            $coursesRepository->add($course);
            return $this->redirectToRoute('app_course_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('course/edit.html.twig', [
            'course' => $course,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_course_delete', methods: ['POST'])]
    public function delete(Request $request, Course $course, CoursesRepository $coursesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$course->getId(), $request->request->get('_token'))) {
            $coursesRepository->remove($course);
        }

        return $this->redirectToRoute('app_course_index', [], Response::HTTP_SEE_OTHER);
    }
}
