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
    private $repairs;

    /**
     * @var \Selhosa\RepairBundle\Entity\Intervention
     */
    private $interventions;


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
    public function setRepairs(\Selhosa\RepairBundle\Entity\Repair $repairs)
    {
        $this->repairs = $repairs;
    
        return $this;
    }

    /**
     * Get repairs
     *
     * @return \Selhosa\RepairBundle\Entity\Repair 
     */
    public function getRepairs()
    {
        return $this->repairs;
    }

    /**
     * Set interventions
     *
     * @param \Selhosa\RepairBundle\Entity\Intervention $interventions
     * @return Charges
     */
    public function setInterventions(\Selhosa\RepairBundle\Entity\Intervention $interventions = null)
    {
        $this->interventions = $interventions;
    
        return $this;
    }

    /**
     * Get interventions
     *
     * @return \Selhosa\RepairBundle\Entity\Intervention 
     */
    public function getInterventions()
    {
        return $this->interventions;
    }
}