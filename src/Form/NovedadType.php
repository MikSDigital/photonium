<?php

namespace App\Form;

use App\Entity\Novedad;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class NovedadType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fecha', DateTimeType::class, array(
                'attr' => [
                    'placeholder' => 'dd/mm/aaaa hh:mm'
                ],
                'widget' => 'single_text',
                'date_format' => 'dd/MM/yyyy HH:mm',
                'format' => 'dd/MM/yyyy HH:mm'
            ))
            ->add('descripcion')
//            ->add('autor')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Novedad::class,
        ]);
    }
}
