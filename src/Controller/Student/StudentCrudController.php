<?php

namespace App\Controller\Student;

use App\Entity\Student;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class StudentCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {

        return Student::class;
        
    }
   
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('pseudo', 'Pseudo'),
            TextField::new('email', 'Adresse mail'),
            TextField::new('password', 'Mot de passe'),
           
        ];
    }
}
