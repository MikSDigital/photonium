<?php

namespace App\Form;

use App\Entity\Demo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class Demo1Type extends AbstractType
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
            ->add('descripcion', TextareaType::class ,array(
                'attr' => [
                    'placeholder' => 'Ingrese texto aqui'
                ],
                
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Demo::class,
        ]);
    }
}
