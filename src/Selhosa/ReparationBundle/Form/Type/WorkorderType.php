<?php

namespace Selhosa\ReparationBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class WorkorderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reference', 'text')
            ->add('model', 'text', array(
            ))
            ->add('priority', 'checkbox', array(
                'required' => false
            ))
            ->add('technicians', 'entity', array(
                'class' => 'UserBundle:User',
                'property' => 'username',
                'multiple' => true,
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
        return 'workorder';
    }
}
