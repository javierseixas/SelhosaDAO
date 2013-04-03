<?php

namespace Selhosa\RepairBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;

class RepairMaterialChargesType extends AbstractType
{

    protected $repairId;

    public function __construct($repairId)
    {
        $this->repairId = $repairId;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('materialCharges', 'collection', array(
                'property_path' => 'Charges',
                'type'   => new MaterialChargeType(),
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'options'  => array(
                    'required'  => false
                )))
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
        return 'repair_material_charges';
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->set('repairId', $this->repairId);

    }
}
