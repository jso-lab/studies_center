<?php

namespace App\Controller\Student;

use App\Entity\Student;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class StudentCrudController extends AbstractCrudController
{

    public const STUDENTS_BASE_PATH = 'images/users';
    public const STUDENTS_UPLOAD_DIR = 'public/images/users';

    public static function getEntityFqcn(): string
    {

        return Student::class;
        
    }
   
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('firstName', 'Nom'),
            TextField::new('lastName', 'Prénom'),
            TextField::new('email', 'Adresse mail'),
            TextField::new('password', 'Mot de passe'),
            ImageField::new('profilPicture', 'Photo de profil')
                ->setBasePath(self::STUDENTS_BASE_PATH)
                ->setUploadDir(self::STUDENTS_UPLOAD_DIR)
        ];
    }
}
