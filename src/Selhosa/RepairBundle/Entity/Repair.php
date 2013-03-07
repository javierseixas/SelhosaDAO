<?php

namespace Selhosa\RepairBundle\Entity;

use Selhosa\WorkBundle\Entity\WorkOrder;
use Doctrine\Common\Collections\ArrayCollection;

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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $charges;

    // TODO Pulir que Repair tenga categories, que no pega mucho porque no tiene relación en la otra entidad
    private $categories;


    public function __construct()
    {
        $this->charges = new ArrayCollection();

        parent::__construct();
    }

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
        return $this->categories;
    }

    public function setElectronicCategories($categories)
    {
        $this->categories = $categories;
    }


    /**
     * Add charges
     *
     * @param \Selhosa\RepairBundle\Entity\Charges $charges
     * @return WorkOrder
     */
    public function addCharge(\Selhosa\RepairBundle\Entity\Charges $charges)
    {
        $this->charges[] = $charges;

        return $this;
    }

    /**
     * Remove charges
     *
     * @param \Selhosa\RepairBundle\Entity\Charges $charges
     */
    public function removeCharge(\Selhosa\RepairBundle\Entity\Charges $charges)
    {
        $this->charges->removeElement($charges);
    }

    /**
     * Get charges
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCharges()
    {
        return $this->charges;
    }

}