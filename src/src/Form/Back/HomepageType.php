<?php

namespace App\Form\Back;

use App\Entity\Homepage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

class HomepageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content', TextareaType::class, [
                'required' => true,
                "attr" => [
                    'class' => "editor",
                    "placeholder" => "Describe what you want"
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Content cannot be blank',
                    ]),
                    new Length([
                        'min' => 10,
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
            'data_class' => Homepage::class,
        ]);
    }
}
