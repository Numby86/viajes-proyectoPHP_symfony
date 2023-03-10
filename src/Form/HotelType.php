<?php

namespace App\Form;

use App\Entity\Hotel;
use App\Entity\Ventajas;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HotelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre')
            ->add('imagen')
            ->add('direccion')
            ->add('ciudad')
            ->add('provincia')
            ->add('precio')
            ->add('valoracion')
            ->add('ventajas', EntityType::class, [
                'class' => Ventajas::class, 
                'choice_label' => 'nombre',
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('CREAR', SubmitType::class, [
                'attr' => ['class' => 'btn btn-primary dark'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Hotel::class,
        ]);
    }
}
