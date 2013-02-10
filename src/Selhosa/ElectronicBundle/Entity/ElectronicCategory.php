<?php

namespace Selhosa\ElectronicBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ElectronicCategory
 */
class ElectronicCategory
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $electroncis;

    /**
     * @var \Selhosa\ElectronicBundle\Entity\Brand
     */
    private $brand;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->electroncis = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set code
     *
     * @param string $code
     * @return ElectronicCategory
     */
    public function setCode($code)
    {
        $this->code = $code;
    
        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return ElectronicCategory
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add electroncis
     *
     * @param \Selhosa\ElectronicBundle\Entity\Electronic $electroncis
     * @return ElectronicCategory
     */
    public function addElectronci(\Selhosa\ElectronicBundle\Entity\Electronic $electroncis)
    {
        $this->electroncis[] = $electroncis;
    
        return $this;
    }

    /**
     * Remove electroncis
     *
     * @param \Selhosa\ElectronicBundle\Entity\Electronic $electroncis
     */
    public function removeElectronci(\Selhosa\ElectronicBundle\Entity\Electronic $electroncis)
    {
        $this->electroncis->removeElement($electroncis);
    }

    /**
     * Get electroncis
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getElectroncis()
    {
        return $this->electroncis;
    }

    /**
     * Set brand
     *
     * @param \Selhosa\ElectronicBundle\Entity\Brand $brand
     * @return ElectronicCategory
     */
    public function setBrand(\Selhosa\ElectronicBundle\Entity\Brand $brand)
    {
        $this->brand = $brand;
    
        return $this;
    }

    /**
     * Get brand
     *
     * @return \Selhosa\ElectronicBundle\Entity\Brand 
     */
    public function getBrand()
    {
        return $this->brand;
    }
}
