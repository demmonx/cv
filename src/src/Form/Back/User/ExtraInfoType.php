<?php

namespace App\Form\Back\User;

use App\Entity\ExtraInfo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;


class ExtraInfoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                "attr" => [
                    'class' => "form-control",
                    "required" => "true",
                    "placeholder" => "The info"
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter the info',
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'The info should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 155,
                    ]),
                ],
            ])
            ->add('icon', TextType::class, [
                "attr" => [
                    'class' => "form-control",
                    "placeholder" => "Font awesome icon name"
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
            'data_class' => ExtraInfo::class,
        ]);
    }
}
