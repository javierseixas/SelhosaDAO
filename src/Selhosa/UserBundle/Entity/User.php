<?php

namespace Selhosa\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Selhosa\ReparationBundle\Entity\WorkOrder;
use Doctrine\Common\Collections\ArrayCollection;

class User extends BaseUser
{
    protected $id;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $groups;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $workorders;


    public function __construct()
    {
        parent::__construct();

        $this->workorders = new ArrayCollection();
        $this->groups = new ArrayCollection();
    }

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
        $this->workorders->removeElement($workorder);
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getWorkorders()
    {
        return $this->workorders;
    }

    /**
     * @param Group $group
     * @return void
     */
    public function addGroups(Group $group)
    {
        if (!$this->groups->contains($group))
            $this->groups->add($group);
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getGroups()
    {
        return $this->groups;
    }
}