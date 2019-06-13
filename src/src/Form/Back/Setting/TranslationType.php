<?php

namespace App\Form\Back\Setting;

use App\Entity\Translation;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

class TranslationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        foreach (Translation::$keys as $key => $value) {
            $builder->add($key, TextType::class, [
                "data" =>  count($options['data']) > 0 ? ( array_key_exists($key, $options['data']) ? $options['data'][$key]->getValue() : "") : "",
                "label" => $value,
                "attr" => [
                    'class' => "form-control spacing-bottom",
                    "required" => "true",
                    "placeholder" => "Translation"
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter the translation',
                    ])
                ],
            ]);
        }
       
        $builder->add('submit', SubmitType::class, [
            'label' => "Save",
            'attr' => [
                'class' => 'btn btn-primary'
            ]
        ])
    ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }
}
