<?php

namespace Selhosa\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Selhosa\ReparationBundle\Entity\WorkOrder;
use Doctrine\Common\Collections\ArrayCollection;

class User extends BaseUser
{
    protected $id;

    public function __construct()
    {
        parent::__construct();

        $this->workorders = new ArrayCollection();
    }


    protected $groups;


    protected $workorders;

    /**
     * @param \Selhosa\ReparationBundle\Entity\WorkOrder $workorder
     */
    public function addWorkorders(WorkOrder $workorder)
    {
        if (!$this->workorders->contains($workorder))
            $this->workorders->add($workorder);
    }

    /**
     * @param \Selhosa\ReparationBundle\Entity\WorkOrder $workorder
     */
    public function removeWorkorder(WorkOrder $workorder)
    {
        $this->clients->removeElement($workorder);
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getWorkorders()
    {
        return $this->workorders;
    }
}