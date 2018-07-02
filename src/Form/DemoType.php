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

class DemoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('usuario')
            ->add('email', EmailType::class)
            ->add('password', PasswordType::class)
            ->add('choice1', ChoiceType::class, array(
                'expanded' => false,
                'multiple' => false,
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
                'multiple' => true,
                'choices' => array(
                    'Uno'=>'1',
                    'Dos'=>'2',
                    'Tres'=>'3',
                    'Cuatro'=>'4',
                    'Cinco'=>'5',
                ),
            ))
            ->add('choice3', ChoiceType::class, array(
                'expanded' => true,
                'multiple' => false,
                'choices' => array(
                    'Uno'=>'1',
                    'Dos'=>'2',
                    'Tres'=>'3',
                ),
            ))
            ->add('choice4', ChoiceType::class, array(
                'expanded' => true,
                'multiple' => true,
                'choices' => array(
                    'Uno'=>'1',
                    'Dos'=>'2',
                    'Tres'=>'3',
                ),
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
