<?php

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use abdielcs\ExpandedCollectionBundle\Form\Type\ExpandedOTMType;
use App\Entity\Categoria;
use App\Entity\Producto;

class DemoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fecha', DateTimeType::class, array(
                'widget' => 'single_text',
                'required' => false,
                'attr' => array('placeholder' => 'dd/mm/aaaa'),
            ))
            ->add('texto')
            ->add('coleccion', ExpandedOTMType::class, array(
                'attr' => array('class'=>'ui table'),
                'class'=>Producto::class,
                'fields' => array(
                    'nombre',
                    'precio',
                    array(
                        'property' => 'discontinuado',
                        'type' => 'boolean',
                        'options' => array('true'=>'Si', 'false'=>'No')
                    ),
                )
            ))
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
