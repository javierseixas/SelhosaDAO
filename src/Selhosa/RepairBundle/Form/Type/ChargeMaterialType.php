<?php

namespace Selhosa\RepairBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class ChargeMaterialType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('references', 'collection', array(
                'label' => 'Referències',
                'type'   => 'text',
                'allow_add' => true,
                'options'  => array(
                    'required'  => false,
                    'attr'      => array(
                        'class' => 'email-box',
                        'placeholder' => "Referència"
                    )
                )))
            ;
    }

    public function getName()
    {
        return 'chargematerialmodal';
    }
}
