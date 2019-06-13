<?php

namespace App\Form\Auth;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

class RegistrationForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => "form-control",
                    'placeHolder' => 'Email'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter your email',
                    ]),
                    new Length([
                        'min' => 5,
                        'minMessage' => 'Your email should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 24,
                    ]),
                    ],
            ])
            ->add('firstname', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => "form-control",
                    'placeHolder' => 'Firstname'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter your firstname',
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Your username should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 120,
                    ]),
                    ],
            ])
            ->add('lastname', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => "form-control",
                    'placeHolder' => 'Lastname'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter your lastname',
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Your lastname should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 120,
                    ]),
                    ],
            ])
            ->add('jobLabel', TextType::class, [
                'label' => false,
                'mapped' => false,
                'attr' => [
                    'class' => "form-control",
                    'placeHolder' => 'Job label'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter the desired job label',
                    ]),
                    new Length([
                        'min' => 5,
                        'minMessage' => 'The job label should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 24,
                    ]),
                    ],
            ])
            ->add('phone', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => "form-control",
                    'placeHolder' => 'Phone number',
                    'required' => 'true'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter your phone number',
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Your phone number should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 80,
                    ]),
                    ],
            ])
            ->add('password', RepeatedType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                
                'mapped' => false,
                'type' => PasswordType::class,
                'invalid_message' => "The password fields must match",
                'first_options' => [
                    'label' => false,
                    'attr' => [
                        'class' => "form-control",
                        'placeHolder' => 'Password'
                    ],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Please enter a password',
                        ]),
                        new Length([
                            'min' => 6,
                            'minMessage' => 'Your password should be at least {{ limit }} characters',
                            // max length allowed by Symfony for security reasons
                            'max' => 24,
                        ]),
                    ],
                ], 
                'second_options' => [ 
                    'label' => false,
                    'attr' => [
                        'class' => "form-control",
                        'placeHolder' => 'Re-type Password'
                    ],
                ],
                
            ])
            ->add('submit', SubmitType::class, [
                'label' => "Install",
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ])
        ;
    }
}
