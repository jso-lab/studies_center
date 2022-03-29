<?php

namespace App\Controller\Admin;

use App\Entity\Teacher;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;


class TeacherCrudController extends AbstractCrudController
{
    public const TEACHERS_BASE_PATH = 'images/users';
    public const TEACHERS_UPLOAD_DIR = 'public/images/users';

    public static function getEntityFqcn(): string
    {
        return Teacher::class;
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
                ->setBasePath(self::TEACHERS_BASE_PATH)
                ->setUploadDir(self::TEACHERS_UPLOAD_DIR)
        ];
    }
    
}
