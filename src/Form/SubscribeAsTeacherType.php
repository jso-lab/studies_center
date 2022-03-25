<?php

namespace App\Form;

use App\Entity\Teacher;
use App\Entity\Course;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SubscribeAsTeacherType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nom', EntityType::class, [
                'choice_label'=> 'firstName', 
                'class' => Teacher::class,
            ])
            ->add('Prénom' , EntityType::class, [
                'choice_label'=> 'lastName', 
                'class' => Teacher::class,
            ])
            ->add('email', EntityType::class, [
                'choice_label'=> 'E-mail', 
                'class' => Teacher::class,
            ])
            ->add('password',  EntityType::class, [
                'choice_label'=> 'Mot de passe', 
                'class' => Teacher::class,
            ])
            ->add('profilPicture',  EntityType::class, [
                'choice_label'=> 'Photo de profil', 
                'class' => Teacher::class,
            ])
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Teacher::class,
        ]);
    }
}
