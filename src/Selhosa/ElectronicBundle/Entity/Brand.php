<?php

namespace Selhosa\ElectronicBundle\Entity;

/**
 * Brand
 */
class Brand
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $electronicCategories;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->electronicCategories = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Brand
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add electronicCategories
     *
     * @param \Selhosa\ElectronicBundle\Entity\ElectronicCategory $electronicCategories
     * @return Brand
     */
    public function addElectronicCategorie(\Selhosa\ElectronicBundle\Entity\ElectronicCategory $electronicCategories)
    {
        $this->electronicCategories[] = $electronicCategories;
    
        return $this;
    }

    /**
     * Remove electronicCategories
     *
     * @param \Selhosa\ElectronicBundle\Entity\ElectronicCategory $electronicCategories
     */
    public function removeElectronicCategorie(\Selhosa\ElectronicBundle\Entity\ElectronicCategory $electronicCategories)
    {
        $this->electronicCategories->removeElement($electronicCategories);
    }

    /**
     * Get electronicCategories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getElectronicCategories()
    {
        return $this->electronicCategories;
    }
}
