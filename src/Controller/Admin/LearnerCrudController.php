<?php

namespace App\Controller\Admin;

use App\Entity\Learner;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class LearnerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Learner::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
