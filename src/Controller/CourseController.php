<?php

namespace App\Controller;

use App\Entity\Course;
use App\Form\CourseType;
use App\Repository\CoursesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



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
    public function new(Request $request, CoursesRepository $coursesRepository): Response
    {
        $course = new Course();
        $form = $this->createForm(CourseType::class, $course);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $coursesRepository->add($course);
            return $this->redirectToRoute('app_course_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('course/new.html.twig', [
            'une formation' => $course,
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
    public function edit(Request $request, Course $course, CoursesRepository $coursesRepository): Response
    {
        $form = $this->createForm(CourseType::class, $course);
        $form->handleRequest($request);

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
