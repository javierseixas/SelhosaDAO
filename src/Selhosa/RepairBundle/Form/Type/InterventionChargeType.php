<?php

namespace Selhosa\RepairBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InterventionChargeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('intervention', 'entity', array(
                'class' => 'SelhosaRepairBundle:ElectronicCategoryIntervention',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('i')->where('i.');
                }))
            ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
    }

    public function getName()
    {
        return 'intervention_charge';
    }
}
