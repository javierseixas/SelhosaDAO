<?php

namespace Selhosa\ElectronicBundle\Creator;

use Selhosa\RepairBundle\Entity\Repair;
use Selhosa\ElectronicBundle\Entity\Electronic;
use Doctrine\ORM\EntityManager;

class ElectronicCreator
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    /**
     * @param \Doctrine\ORM\EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function create(Repair $repair)
    {
        $model = $repair->getModel();

        $electronic = $this->em->getRepository('SelhosaElectronicBundle:Electronic')->findOneBy(array('model' => $model));

        if (!$electronic) {
            $electronic = new Electronic();
            $electronic
                ->setModel($model)
                ->setCategory($repair->getElectronicCategories());
        }

        $repair->setElectronic($electronic);

    }

    /**
     * @deprecated
     *
     * @return \Selhosa\ElectronicBundle\Entity\ElectronicCategory
     */
    protected function defaultCategory()
    {
        return $this->em->getRepository('SelhosaElectronicBundle:ElectronicCategory')->find(1);
    }


}
