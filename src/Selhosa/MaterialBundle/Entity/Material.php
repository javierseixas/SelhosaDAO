<?php

namespace Selhosa\MaterialBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Material
 */
class Material
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $reference;

    /**
     * @var string
     */
    private $description;

    /**
     * @var float
     */
    private $costPrice;


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
     * Set reference
     *
     * @param string $reference
     * @return Material
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    
        return $this;
    }

    /**
     * Get reference
     *
     * @return string 
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Material
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
     * Set costPrice
     *
     * @param float $costPrice
     * @return Material
     */
    public function setCostPrice($costPrice)
    {
        $this->costPrice = $costPrice;
    
        return $this;
    }

    /**
     * Get costPrice
     *
     * @return float 
     */
    public function getCostPrice()
    {
        return $this->costPrice;
    }
}
