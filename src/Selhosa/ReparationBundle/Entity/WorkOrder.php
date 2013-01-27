<?php

namespace Selhosa\ReparationBundle\Entity;

use Selhosa\UserBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;

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
    protected $reference;

    /**
     * @var string
     */
    protected $model;

    /**
     * @var boolean
     */
    protected $priority;

    /**
     * @var \Datetime
     */
    protected $createdAt;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $notes;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $technicians;

    /**
     * @var WorkOrderStatus
     */
    private $current_status;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $statusChanges;

    /**
     * @var string
     */
    protected $serialNumber;


    public function __construct()
    {
        $this->notes = new ArrayCollection();
        $this->technicians = new ArrayCollection();
        $this->statusChanges = new ArrayCollection();
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
        $this->model = preg_replace("/[^A-Za-z0-9 ]/", '', $model);
    
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

    /**
     * @param \Datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return \Datetime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \Selhosa\UserBundle\Entity\User $technician
     */
    public function addTechnician(User $technician)
    {
        if (!$this->technicians->contains($technician))
            $this->technicians->add($technician);
    }

    /**
     * @param WorkOrder $technician
     */
    public function removeTechnician(User $technician)
    {
        $this->technicians->removeElement($technician);
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getTechnicians()
    {
        return $this->technicians;
    }

    /**
     * @param string $serialNumber
     */
    public function setSerialNumber($serialNumber)
    {
        $this->serialNumber = $serialNumber;
    }

    /**
     * @return string
     */
    public function getSerialNumber()
    {
        return $this->serialNumber;
    }

    /**
     * @param WorkOrderStatusChange $statusChange
     */
    public function addStatusChange(WorkOrderStatusChange $statusChange)
    {
        if (!$this->statusChanges->contains($statusChange))
            $this->statusChanges->add($statusChange);
    }

    /**
     * @param WorkOrderStatusChange $statusChange
     */
    public function removeStatusChange(WorkOrderStatusChange $statusChange)
    {
        $this->statusChanges->removeElement($statusChange);
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getStatusChanges()
    {
        return $this->statusChanges;
    }



}
