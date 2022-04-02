<?php

namespace App\Controller\Teacher;

use App\Entity\Course;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class CourseCrudController extends AbstractCrudController
{
    public const COURSES_BASE_PATH = 'images/courses';
    public const COURSES_UPLOAD_DIR = 'public/images/courses';

    public static function getEntityFqcn(): string
    {
        return Course::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            ImageField::new('illustration')
                ->setBasePath(self::COURSES_BASE_PATH)
                ->setUploadDir(self::COURSES_UPLOAD_DIR),
            TextEditorField::new('description'),
            
        ];
    }
    
}
