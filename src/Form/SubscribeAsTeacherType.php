<?php

namespace App\Form;

use App\Entity\Teacher;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SubscribeAsTeacherType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, [
                'required' => true,
                'label' => 'Nom'
            ])
            ->add('lastName', TextType::class, [
                'required' => true,
                'label' => 'Prénom'
            ])
            ->add('email', EmailType::class, [
                'required' => true,
                'label' => 'E-mail'
            ])
            ->add('password', PasswordType::class, [
                'required' => true,
                'label' => 'Mot de passe'
            ])
            ->add('profilPicture', FileType::class, [
                'required' => true,
                'label' => 'Photo de profil'
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Vos spécialités',
            ])
            ->add('Envoyer', SubmitType::class)
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Teacher::class,
            'invalid_message' => 'Erreur dans le formulaire',
        ]);
    }
}
