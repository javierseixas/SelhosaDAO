<?php

namespace Selhosa\RepairBundle\Entity;

use Selhosa\WorkBundle\Entity\WorkOrder;

/**
 * WorkOrder
 */
class Repair extends WorkOrder
{
    /**
     * @var integer
     */
    private  $id;

    /**
     * @var \Selhosa\ElectronicBundle\Entity\Electronic
     */
    private $electronic;

    /**
     * @param \Selhosa\ElectronicBundle\Entity\Electronic $electronic
     */
    public function setElectronic($electronic)
    {
        $this->electronic = $electronic;

        return $this;
    }

    /**
     * @return \Selhosa\ElectronicBundle\Entity\Electronic
     */
    public function getElectronic()
    {
        return $this->electronic;
    }

    public function getElectronicCategories()
    {
        return null;
    }

    public function setElectronicCategories($categories)
    {
        $this->categories = $categories;
    }



}
