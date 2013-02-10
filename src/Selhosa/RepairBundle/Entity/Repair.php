<?php

namespace Selhosa\RepairBundle\Entity;

use Selhosa\WorkBundle\Entity\WorkOrder;

/**
 * WorkOrder
 */
class Repair extends WorkOrder
{
    /**
     * @var integer
     */
    private  $id;

    /**
     * @var Selhosa\ElectronicBundle\Entity\Electronic
     */
    private $electronic;

}
