<?php

namespace App\Form;

use App\Entity\Teacher;


use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;


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
                'mapped' => false,
                'label' => 'Mot de passe',
                'constraints' => [
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Le mot doit contenir au moins {{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 255,
                    ]),
                ],
            
            ])
    
            ->add('profilPicture', FileType::class,[ 
             'label' => 'Définissez un avatar'  
            ])
            ->add('presentation', TextareaType::class,[
                'label' => 'Vos spécialités'  
            ])
            ->add('Envoyer', SubmitType::class, [
                'label' => 'Soumettre le formulaire'
            ])
         
        ; 
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Teacher::class
        ]);
    }
}
