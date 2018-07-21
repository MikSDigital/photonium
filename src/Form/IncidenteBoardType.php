<?php

namespace App\Form;

use App\Entity\Incidente;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use abdielcs\ExpandedCollectionBundle\Form\Type\ExpandedMTMType;
use App\Entity\Camara;
use abdielcs\ExpandedCollectionBundle\Form\Type\ExpandedOTMType;

class IncidenteBoardType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//             ->add('descripcion', ExpandedMTMType::class)
            ->add('camaras', ExpandedOTMType::class, array(
                'attr' => array('class'=>'ui table'),
                'class' => Camara::class,
                'fields' => array(
                    'nombre',
                ))
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Incidente::class,
        ]);
    }
}
