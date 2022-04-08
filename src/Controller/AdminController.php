<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Entity\User;
use App\Form\EditUserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/admin', name: 'app_admin_')]

class AdminController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
    
    //Liste des utilisateurs
     
    #[Route('/users', name: 'users')]
    public function UserList(UserRepository $user) {
        return $this->render("admin/users.html.twig", [
            'users' => $user->findAll()
        ]);
    }
    //Modify a user
    #[Route('/users/modify/{id}', name: 'modify_user')]
    public function modifyUser(User $user,EntityManagerInterface $em, Request $request)
    {
        $userForm = $this->createForm(EditUserType::class, $user);
        $userForm->handleRequest($request);
        
        if ($userForm->isSubmitted() && $userForm->isValid()) {
          
            $em->persist($user);
            $em->flush();
            //Message de validation
            $this->addFlash('message', 'Utilisateur modifié avec succès !');

            return $this->redirectToRoute('app_admin_users');
        }
        return $this->renderForm('admin/modify.html.twig', [
            'userForm' => $userForm,
        ]);
    }
}
