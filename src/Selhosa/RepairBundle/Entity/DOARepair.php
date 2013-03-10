<?php

namespace Selhosa\RepairBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * DOARepair
 */
class DOARepair extends Repair
{
    /**
     * @var integer
     */
    private  $id;

    /**
     * @var string
     */
    private $rmaid;

    /**
     * @var string
     */
    private $creditMemo;

    /**
     * @var string
     */
    private $creditDelivery;


    /**
     * Set rmaid
     *
     * @param string $rmaid
     * @return DOARepair
     */
    public function setRmaid($rmaid)
    {
        $this->rmaid = $rmaid;
    
        return $this;
    }

    /**
     * Get rmaid
     *
     * @return string 
     */
    public function getRmaid()
    {
        return $this->rmaid;
    }

    /**
     * Set creditMemo
     *
     * @param string $creditMemo
     * @return DOARepair
     */
    public function setCreditMemo($creditMemo)
    {
        $this->creditMemo = $creditMemo;
    
        return $this;
    }

    /**
     * Get creditMemo
     *
     * @return string 
     */
    public function getCreditMemo()
    {
        return $this->creditMemo;
    }

    /**
     * Set creditDelivery
     *
     * @param string $creditDelivery
     * @return DOARepair
     */
    public function setCreditDelivery($creditDelivery)
    {
        $this->creditDelivery = $creditDelivery;
    
        return $this;
    }

    /**
     * Get creditDelivery
     *
     * @return string 
     */
    public function getCreditDelivery()
    {
        return $this->creditDelivery;
    }
}