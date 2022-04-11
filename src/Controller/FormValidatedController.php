<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[IsGranted('ROLE_ADMIN')]
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
