<?php

namespace Selhosa\WorkBundle\Entity;

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
     * @var \Selhosa\WorkBundle\Entity\WorkOrder
     */
    private $workorder;

    /**
     * @var \Selhosa\WorkBundle\Entity\WorkOrderStatus
     */
    protected $previousStatus;

    /**
     * @var \Selhosa\WorkBundle\Entity\WorkOrderStatus
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
     * @param \Selhosa\WorkBundle\Entity\WorkOrder $workorder
     */
    public function setWorkorder($workorder)
    {
        $this->workorder = $workorder;

        return $this;
    }

    /**
     * @return \Selhosa\WorkBundle\Entity\WorkOrder
     */
    public function getWorkorder()
    {
        return $this->workorder;
    }

    /**
     * @param \Selhosa\WorkBundle\Entity\WorkOrderStatus $newStatus
     */
    public function setNewStatus($newStatus)
    {
        $this->newStatus = $newStatus;

        return $this;
    }

    /**
     * @return \Selhosa\WorkBundle\Entity\WorkOrderStatus
     */
    public function getNewStatus()
    {
        return $this->newStatus;
    }

    /**
     * @param \Selhosa\WorkBundle\Entity\WorkOrderStatus $previousStatus
     */
    public function setPreviousStatus($previousStatus)
    {
        $this->previousStatus = $previousStatus;

        return $this;
    }

    /**
     * @return \Selhosa\WorkBundle\Entity\WorkOrderStatus
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
