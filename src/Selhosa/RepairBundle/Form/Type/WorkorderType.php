<?php

namespace Selhosa\RepairBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class WorkorderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reference', 'text', array('label' => 'Referència'))
            ->add('model', 'text', array(
                'attr' => array(
                    'class' => 'typeahead',
                    'data-source' => "[\"KDL40W5500\",\"KDL60LX900\"]",
                )
            ))
            ->add('electronicCategories', 'entity', array(
                'class' => 'SelhosaElectronicBundle:ElectronicCategory'
            ))
            ->add('serialNumber', 'text', array('label' => 'Número de serie'))
            ->add('priority', 'checkbox', array(
                'required' => false,
                'label' => 'Reparació prioritària'
            ))
            ->add('technicians', 'entity', array(
                'label' => 'Tècnic',
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
        return 'repair';
    }
}
