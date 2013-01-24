<?php

namespace Selhosa\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Selhosa\ReparationBundle\Entity\WorkOrder;
use Doctrine\Common\Collections\ArrayCollection;

/**
* @ORM\Entity
* @ORM\Table(name="User")
*/
class User extends BaseUser
{
    /**
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    protected $id;

    public function __construct()
    {
        parent::__construct();

        $this->workorders = new ArrayCollection();
    }


    /**
     * @ORM\ManyToMany(targetEntity="Selhosa\UserBundle\Entity\Group")
     * @ORM\JoinTable(name="User_Groups",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
     * )
     */
    protected $groups;

    /**
     * @ManyToMany(targetEntity="WorkOrder", inversedBy="technicians")
     * @JoinTable(name="Technician_WorkOrder")
     */
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