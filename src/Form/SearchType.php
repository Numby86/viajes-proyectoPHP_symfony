<?php

namespace App\Form;

use App\Entity\Hotel;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('hotel', EntityType::class, [
                'class' => Hotel::class,
                'choice_label' => 'nombre',
                'placeholder' => 'Busca tu hotel preferido...',
                'autocomplete' => 'true',
                'attr' => [
                    'onchange' => 'this.form.submit()'
                ]
            ])

            ->add('provincia', EntityType::class, [
                'class' => Hotel::class,
                'choice_label' => 'provincia',
                'placeholder' => 'A que provincia vas a viajar?',
                'autocomplete' => 'true',
                'attr' => [
                    'onchange' => 'this.form.submit()'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
