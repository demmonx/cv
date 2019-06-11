<?php

namespace App\Form\Back\Skill;

use App\Entity\LanguageSkill;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

use Symfony\Component\Validator\Constraints\Range;


class LanguageSkillType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('name', TextType::class, [
            "attr" => [
                'class' => "form-control",
                "required" => "true",
                "placeholder" => "Language name"
            ],
            'constraints' => [
                new NotBlank([
                    'message' => 'Please enter the name',
                ]),
                new Length([
                    'min' => 2,
                    'minMessage' => 'The name should be at least {{ limit }} characters',
                    // max length allowed by Symfony for security reasons
                    'max' => 155,
                ]),
            ],
        ])
        ->add('level', NumberType::class, [
            "input" => "number",
            "attr" => [
                'class' => "form-control",
                "required" => "true",
                "placeholder" => "Experience between 1 and 100% (ex: 80)"
            ],
            'constraints' => [
                new NotBlank([
                    'message' => 'Please enter the experience level',
                ]),
                new Range([
                    'min' => 1,
                    'minMessage' => 'The experience should be at least {{ limit }} %',
                    'maxMessage' => 'The experience should be at max {{ limit }} %',
                    'max' => 100,
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
            'data_class' => LanguageSkill::class,
        ]);
    }
}
