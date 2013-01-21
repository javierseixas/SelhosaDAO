<?php

namespace Selhosa\ReparationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WorkOrderStatus
 */
class WorkOrderStatus
{

    const STATUS_INIT = 10;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $keyword;

    /**
     * @var
     */
    private $workorders;

    /**
     * @param intenger $id
     */
    function __construct($id = self::STATUS_INIT)
    {
        $this->id = $id;
        // $this->workorders = $workorders;
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
     * Set description
     *
     * @param string $description
     * @return WorkOrderStatus
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
     * Set keyword
     *
     * @param string $keyword
     * @return WorkOrderStatus
     */
    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;
    
        return $this;
    }

    /**
     * Get keyword
     *
     * @return string 
     */
    public function getKeyword()
    {
        return $this->keyword;
    }
}
