<?php

namespace Selhosa\RepairBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MaterialType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reference', 'text', array(
                'label' => 'Referència',
                'required' => true,
                'attr' => array(
                    'placeholder' => 'Referència',
                    'class' => 'material-reference'
                )
            ))
            ->add('costPrice', 'money', array(
                'label' => 'Cost',
                'required' => false,
                'attr' => array('placeholder' => 'Preu de cost')
            ))
            ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Selhosa\MaterialBundle\Entity\Material',
        ));
    }

    public function getName()
    {
        return 'material';
    }
}
