<?php

namespace Selhosa\ReparationBundle\Entity;

/**
 * WorkOrder
 */
class WorkOrder
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
    private $model;

    /**
     * @var boolean
     */
    private $priority;

    /**
     * @var 
     */
    private $notes;

    /**
     * @var WorkOrderStatus
     */
    private $current_status;


    public function __construct()
    {
        // $this->notes = ;
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
     * Set reference
     *
     * @param string $reference
     * @return WorkOrder
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
     * Set model
     *
     * @param string $model
     * @return WorkOrder
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
     * Set priority
     *
     * @param boolean $priority
     * @return WorkOrder
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    
        return $this;
    }

    /**
     * Get priority
     *
     * @return boolean 
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param $current_status
     * @return WorkOrder
     */
    public function setCurrentStatus($current_status)
    {
        $this->current_status = $current_status;

        return $this;
    }

    /**
     * @return WorkOrderStatus
     */
    public function getCurrentStatus()
    {
        return $this->current_status;
    }


}
