<?php

namespace App\Form;


use App\Entity\Lesson;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class LessonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name', RangeType::class, [
            'mapped' => false,
            'attr' => [
                'min' => 5,
                'max' => 50
            ],
        ])
            ->add('title', TextType::class, [
                'label' => 'intitulé'
            ])
            ->add('video', FileType::class, [
                'label' => 'Vidéo',
                'mapped' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '10024k',
                        'mimeTypes' => [
                            'video/mpeg',
                            'video/mp4',
                            'video/webm'
                        ]
                    ])
                ]
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Transcription'
            ])
            ->add('files', FileType::class, [
                'label' => 'Ressources',
                'mapped' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1000k',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/doc'
                        ]
                    ])
                ]
            ])
            ->add('section', TextType::class, [
                'mapped' => false,
                'label' => 'Formation'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Lesson::class,
        ]);
    }
}
