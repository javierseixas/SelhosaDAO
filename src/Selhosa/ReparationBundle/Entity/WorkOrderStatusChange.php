<?php

namespace Selhosa\ReparationBundle\Entity;

/**
 * Note
 */
class WorkOrderStatusChange
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \Selhosa\ReparationBundle\Entity\WorkOrder
     */
    private $workorder;

    /**
     * @var \Selhosa\ReparationBundle\Entity\WorkOrderStatus
     */
    protected $previousStatus;

    /**
     * @var \Selhosa\ReparationBundle\Entity\WorkOrderStatus
     */
    protected $newStatus;

    /**
     * @var \Selhosa\UserBundle\Entity\User
     */
    protected $user;

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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Note
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \Selhosa\ReparationBundle\Entity\WorkOrder $workorder
     */
    public function setWorkorder($workorder)
    {
        $this->workorder = $workorder;

        return $this;
    }

    /**
     * @return \Selhosa\ReparationBundle\Entity\WorkOrder
     */
    public function getWorkorder()
    {
        return $this->workorder;
    }

    /**
     * @param \Selhosa\ReparationBundle\Entity\WorkOrderStatus $newStatus
     */
    public function setNewStatus($newStatus)
    {
        $this->newStatus = $newStatus;

        return $this;
    }

    /**
     * @return \Selhosa\ReparationBundle\Entity\WorkOrderStatus
     */
    public function getNewStatus()
    {
        return $this->newStatus;
    }

    /**
     * @param \Selhosa\ReparationBundle\Entity\WorkOrderStatus $previousStatus
     */
    public function setPreviousStatus($previousStatus)
    {
        $this->previousStatus = $previousStatus;

        return $this;
    }

    /**
     * @return \Selhosa\ReparationBundle\Entity\WorkOrderStatus
     */
    public function getPreviousStatus()
    {
        return $this->previousStatus;
    }

    /**
     * @param \Selhosa\UserBundle\Entity\User $user
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return \Selhosa\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }



}
