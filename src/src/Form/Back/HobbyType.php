<?php

namespace App\Form\Back;

use App\Entity\Hobby;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

class HobbyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('name', TextType::class, [
            "attr" => [
                'class' => "form-control",
                "required" => "true",
                "placeholder" => "Title"
            ],
            'constraints' => [
                new NotBlank([
                    'message' => 'Please enter the title',
                ]),
                new Length([
                    'min' => 2,
                    'minMessage' => 'The title should be at least {{ limit }} characters',
                    // max length allowed by Symfony for security reasons
                    'max' => 155,
                ]),
            ],
        ])
        ->add('text', TextareaType::class, [
            "attr" => [
                'class' => "form-control",
                "required" => "true",
                'rows' => 5,
                "placeholder" => "Describe the hobby"
            ],
            'constraints' => [
                new NotBlank([
                    'message' => 'Please enter a content',
                ]),
                new Length([
                    'min' => 20,
                    'minMessage' => 'The content should be at least {{ limit }} characters',

                ]),
            ],
        ])
        ->add('submit', SubmitType::class, [
            'label' => "Save",
            'attr' => [
                'class' => 'btn btn-primary'
            ]
        ])
    ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Hobby::class,
        ]);
    }
}
