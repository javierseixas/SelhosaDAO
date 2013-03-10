<?php

namespace Selhosa\RepairBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * CEPLRepair
 */
class CEPLRepair extends Repair
{
    /**
     * @var integer
     */
    private  $id;

    /**
     * @var string
     */
    private $deliveryNote;


    /**
     * Set deliveryNote
     *
     * @param string $deliveryNote
     * @return CEPLRepair
     */
    public function setDeliveryNote($deliveryNote)
    {
        $this->deliveryNote = $deliveryNote;
    
        return $this;
    }

    /**
     * Get deliveryNote
     *
     * @return string 
     */
    public function getDeliveryNote()
    {
        return $this->deliveryNote;
    }
}