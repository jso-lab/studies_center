<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormValidatedController extends AbstractController
{
    #[Route('/form/validated', name: 'app_form_validated')]
    public function index(): Response
    {
        return $this->render('form_validated/index.html.twig', [
            'controller_name' => 'FormValidatedController',
        ]);
    }
}
