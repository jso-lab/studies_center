<?php

namespace App\Controller;

use App\Entity\Admin;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RegistrationController extends AbstractController
{
    public function index(UserPasswordHasherInterface $passwordHasher) 
    {
        $admin = new Admin('EcoIT-Admin');
        $plaintextPassword = ('HtmletCSS_44');

        $hashedPassword = $passwordHasher->hashPassword(
            $admin,
            $plaintextPassword
        );
        $admin->setPassword($hashedPassword);
    }
}

