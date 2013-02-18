<?php

namespace Selhosa\RepairBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Charges
 */
class Charges
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $realWorkedTime;

    /**
     * @var integer
     */
    private $chargebleTime;

    /**
     * @var \Selhosa\RepairBundle\Entity\Repair
     */
    private $repair;

    /**
     * @var \Selhosa\RepairBundle\Entity\Intervention
     */
    private $intervention;


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
     * Set realWorkedTime
     *
     * @param integer $realWorkedTime
     * @return Charges
     */
    public function setRealWorkedTime($realWorkedTime)
    {
        $this->realWorkedTime = $realWorkedTime;
    
        return $this;
    }

    /**
     * Get realWorkedTime
     *
     * @return integer 
     */
    public function getRealWorkedTime()
    {
        return $this->realWorkedTime;
    }

    /**
     * Set chargebleTime
     *
     * @param integer $chargebleTime
     * @return Charges
     */
    public function setChargebleTime($chargebleTime)
    {
        $this->chargebleTime = $chargebleTime;
    
        return $this;
    }

    /**
     * Get chargebleTime
     *
     * @return integer 
     */
    public function getChargebleTime()
    {
        return $this->chargebleTime;
    }

    /**
     * Set repairs
     *
     * @param \Selhosa\RepairBundle\Entity\Repair $repairs
     * @return Charges
     */
    public function setRepair(\Selhosa\RepairBundle\Entity\Repair $repair)
    {
        $this->repair = $repair;
    
        return $this;
    }

    /**
     * Get repairs
     *
     * @return \Selhosa\RepairBundle\Entity\Repair 
     */
    public function getRepair()
    {
        return $this->repair;
    }

    /**
     * Set interventions
     *
     * @param \Selhosa\RepairBundle\Entity\Intervention $interventions
     * @return Charges
     */
    public function setIntervention(\Selhosa\RepairBundle\Entity\Intervention $intervention = null)
    {
        $this->intervention = $intervention;
    
        return $this;
    }

    /**
     * Get interventions
     *
     * @return \Selhosa\RepairBundle\Entity\Intervention 
     */
    public function getIntervention()
    {
        return $this->intervention;
    }
}