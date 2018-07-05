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
            ->add('choice1', ChoiceType::class, array(
                'expanded' => false,
                'multiple' => false,
                'required' => false,
                'attr' => array('class' => 'search'),
                'choices' => array(
                    'Uno'=>'1',
                    'Dos'=>'2',
                    'Tres'=>'3',
                    'Cuatro'=>'4',
                    'Cinco'=>'5',
                ),
            ))
            ->add('choice2', ChoiceType::class, array(
                'expanded' => false,
                'attr' => array('class' => 'search'),
                'multiple' => true,
                'required' => false,
                'choices' => array(
                    'Uno'=>'1',
                    'Dos'=>'2',
                    'Tres'=>'3',
                    'Cuatro'=>'4',
                    'Cinco'=>'5',
                ),
            ))
            ->add('radio', ChoiceType::class, array(
                'expanded' => true,
                'multiple' => false,
                'required' => false,
                'choices' => array(
                    'Uno'=>'1',
                    'Dos'=>'2',
                ),
            ))
            ->add('checkbox', ChoiceType::class, array(
                'expanded' => true,
                'multiple' => true,
                'required' => false,
                'choices' => array(
                    'Uno'=>'1',
                    'Dos'=>'2',
                ),
            ))
            ->add('test', ExpandedOTMType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
