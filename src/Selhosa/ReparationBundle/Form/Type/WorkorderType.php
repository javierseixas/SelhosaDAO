<?php

namespace Selhosa\ReparationBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class WorkorderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reference', 'text')
            ->add('model', 'text', array(
                'required' => false
            ))
            ->add('priority', 'checkbox', array(
                'required' => false
            ))
            ->add('technicians', 'entity', array(
                'class' => 'UserBundle:User',
                'property' => 'username',
                'multiple' => true
            ))
            ;
    }

    public function getName()
    {
        return 'workorder';
    }
}
