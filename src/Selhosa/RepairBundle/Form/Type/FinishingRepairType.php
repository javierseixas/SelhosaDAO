<?php

namespace Selhosa\RepairBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FinishingRepairType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('interventionCharge', new InterventionChargeType(), array(
                'property_path' => 'Charges',
                'required' => true,
                'attr' => array(
                    'placeholder' => 'Referència',
                    'class' => 'material-reference'
                )
            ))
            ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Selhosa\RepairBundle\Entity\Repair',
        ));
    }

    public function getName()
    {
        return 'finishing_repair';
    }
}
