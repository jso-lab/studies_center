<?php

namespace App\Form;


use App\Entity\Course;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;


class CourseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
           
            ->add('title', TextType::class, [
                'label' => 'Titre'
            ])
            ->add('illustration', FileType::class, [
                'label' => 'Visuel',
                'mapped' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png'
                        ]
                    ])
                ]
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Extrait du cours'
            ])
            ->add('section', ChoiceType::class ,[
                'choices' => [
                    'Développement durable' => true,
                    'Ecologie domestique' => true,
                    'Nature technique' => true
                ],
                'mapped' => false
            ])
       
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Course::class
            
        ]);
    }
}
