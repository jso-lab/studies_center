<?php

namespace App\Form;

use App\Entity\Teacher;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SubscribeAsTeacherType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class,[
            
                'label' => 'Nom'
               
            ])
            ->add('lastName', TextType::class,[
                
                'label' =>'Prénom',
                
            ])
            ->add('email', EmailType::class,[
                
                'label' => 'E-mail'
               
            ])
            ->add('password', PasswordType::class, [
               
                'label' => 'Mot de passe'
               
            ])
            ->add('profilPicture', FileType::class,[
                
                'label' => 'Photo de profil'
               
            ])
            ->add('presentation', TextType::class,[
               
                'label' => 'Vos spécialités'
               
            ])
            
           
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
