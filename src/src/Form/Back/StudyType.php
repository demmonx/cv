<?php

namespace App\Form\Back;

use App\Entity\Study;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;


use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

class StudyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                "attr" => [
                    'class' => "form-control",
                    "required" => "true",
                    "placeholder" => "Diploma name"
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter the diploma name',
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'The name should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 155,
                    ]),
                ],
            ])
            ->add('location', TextType::class, [
                "attr" => [
                    'class' => "form-control",
                    "required" => "true",
                    "placeholder" => "Location"
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter the location',
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'The location should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 155,
                    ]),
                ],
            ])
            ->add('startDate', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'required' => false,
                "attr" => [
                    'class' => "js-datepicker-year",
                    "placeholder" => "Start date",
                ]
            ])
            ->add('endDate',  DateType::class,[
                'widget' => 'single_text',
                'html5' => false,
                'required' => false,
                "attr" => [
                    'class' => "js-datepicker-year",
                    "placeholder" => "End date",
                ]
            ])
            ->add('content', TextareaType::class, [
                'required' => false,
                "attr" => [
                    'class' => "form-control",
                    'rows' => 3,
                    "placeholder" => "Describe what you do during this diploma"
                ],
                'constraints' => [
                    new Length([
                        'min' => 10,
                        'minMessage' => 'The content should be at least {{ limit }} characters',
    
                    ]),
                ],
            ])
            ->add('enabled', CheckboxType::class, [
                "label" => "Visible on the resume ?",
                'required' => false,
                "attr" => [
                    'class' => "",
                ]
            ])
            ->add('current', CheckboxType::class, [
                "label" => "Current ?",
                'required' => false,
                "attr" => [
                    'class' => "",
                ]
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
            'data_class' => Study::class,
        ]);
    }
}
