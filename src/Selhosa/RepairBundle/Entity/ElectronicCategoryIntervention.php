<?php

namespace Selhosa\RepairBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ElectronicCategoryIntervention
 */
class ElectronicCategoryIntervention
{
    /**
     * @var \Selhosa\ElectronicBundle\Entity\ElectronicCategory
     */
    private $electronicCategory;

    /**
     * @var \Selhosa\RepairBundle\Entity\Intervention
     */
    private $intervention;


    /**
     * Set electronicCategory
     *
     * @param \Selhosa\ElectronicBundle\Entity\ElectronicCategory $electronicCategory
     * @return ElectronicCategoryIntervention
     */
    public function setElectronicCategory(\Selhosa\ElectronicBundle\Entity\ElectronicCategory $electronicCategory)
    {
        $this->electronicCategory = $electronicCategory;
    
        return $this;
    }

    /**
     * Get electronicCategory
     *
     * @return \Selhosa\ElectronicBundle\Entity\ElectronicCategory 
     */
    public function getElectronicCategory()
    {
        return $this->electronicCategory;
    }

    /**
     * Set intervention
     *
     * @param \Selhosa\RepairBundle\Entity\Intervention $intervention
     * @return ElectronicCategoryIntervention
     */
    public function setIntervention(\Selhosa\RepairBundle\Entity\Intervention $intervention)
    {
        $this->intervention = $intervention;
    
        return $this;
    }

    /**
     * Get intervention
     *
     * @return \Selhosa\RepairBundle\Entity\Intervention 
     */
    public function getIntervention()
    {
        return $this->intervention;
    }
}