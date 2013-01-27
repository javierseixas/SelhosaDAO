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
    }

    /**
     * @return \Selhosa\ReparationBundle\Entity\WorkOrder
     */
    public function getWorkorder()
    {
        return $this->workorder;
    }


}
