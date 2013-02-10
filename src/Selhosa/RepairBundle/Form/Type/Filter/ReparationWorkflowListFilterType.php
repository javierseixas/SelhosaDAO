<?php

namespace Selhosa\RepairBundle\Form\Type\Filter;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class ReparationWorkflowListFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('technicians', 'entity', array(
                'class' => 'UserBundle:User',
                'property' => 'username',
                'multiple' => false,
                'empty_value' => 'Tots',
                'required' => false,
                'query_builder' => function(EntityRepository $er) {
                    $qb = $er->createQueryBuilder('u');
                    return $qb
                        ->where($qb->expr()->like('u.roles', ':roleKey'))
                        ->setParameter('roleKey','%ROLE_TECHNICIAN%');
                }
            ))
            ;
    }

    public function getName()
    {
        return 'reparation_workflow_list_filter';
    }
}
