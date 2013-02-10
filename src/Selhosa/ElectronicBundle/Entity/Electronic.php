<?php

namespace Selhosa\ElectronicBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Electronic
 */
class Electronic
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $model;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $repairs;

    /**
     * @var \Selhosa\ElectronicBundle\Entity\ElectronicCategory
     */
    private $category;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->repairs = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set model
     *
     * @param string $model
     * @return Electronic
     */
    public function setModel($model)
    {
        $this->model = $model;
    
        return $this;
    }

    /**
     * Get model
     *
     * @return string 
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Add repairs
     *
     * @param \Selhosa\RepairBundle\Entity\Repair $repairs
     * @return Electronic
     */
    public function addRepair(\Selhosa\RepairBundle\Entity\Repair $repairs)
    {
        $this->repairs[] = $repairs;
    
        return $this;
    }

    /**
     * Remove repairs
     *
     * @param \Selhosa\RepairBundle\Entity\Repair $repairs
     */
    public function removeRepair(\Selhosa\RepairBundle\Entity\Repair $repairs)
    {
        $this->repairs->removeElement($repairs);
    }

    /**
     * Get repairs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRepairs()
    {
        return $this->repairs;
    }

    /**
     * Set category
     *
     * @param \Selhosa\ElectronicBundle\Entity\ElectronicCategory $category
     * @return Electronic
     */
    public function setCategory(\Selhosa\ElectronicBundle\Entity\ElectronicCategory $category)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return \Selhosa\ElectronicBundle\Entity\ElectronicCategory 
     */
    public function getCategory()
    {
        return $this->category;
    }
}
