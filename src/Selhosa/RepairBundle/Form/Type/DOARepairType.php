<?php

namespace Selhosa\RepairBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class DOARepairType extends WorkorderType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('rmaid', 'text', array('label' => 'RMAID'))
            ->add('creditMemo', 'text', array('label' => 'Credit Memo'))
            ->add('creditDelivery', 'text', array('label' => 'Credit Delivery'))
            ;
    }

    public function getName()
    {
        return 'doarepair';
    }
}
