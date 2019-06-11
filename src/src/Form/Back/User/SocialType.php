<?php

namespace App\Form\Back\User;

use App\Entity\Social;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

class SocialType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('name', ChoiceType::class, [
            "choices" => $options['choices'],
            "attr" => [
                'class' => "form-control",
                "required" => "true",
                "placeholder" => "The info"
            ],
            'constraints' => [
                new NotBlank([
                    'message' => 'Please enter the info',
                ])
            ],
        ])
        ->add('url', UrlType::class, [
            "attr" => [
                'class' => "form-control",
                "placeholder" => "Account URL"
            ],
            'constraints' => [
                new NotBlank([
                    'message' => 'Please enter the url',
                ]),
                new Length([
                    'min' => 2,
                    'minMessage' => 'The url should be at least {{ limit }} characters',
                    // max length allowed by Symfony for security reasons
                    'max' => 255,
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
            'data_class' => Social::class,
            'choices' => []
        ]);
    }
}
