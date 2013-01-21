<?php

namespace Selhosa\ReparationBundle\Manager;

use Selhosa\ReparationBundle\Entity\WorkOrder;

class WorkOrderStatusManager
{
    /**
     * @param \Selhosa\ReparationBundle\Entity\WorkOrder $workorder
     */
    protected $workorder;

    function __construct(WorkOrder $workorder)
    {
        $this->workorder = $workorder;
    }

    public function diagnoseToOrderMaterial()
    {

    }

    public function orderMaterialToReceiveMaterial()
    {

    }

    public function receiveMaterialToRepair()
    {

    }

    public function repairToOrderMaterial()
    {

    }

    public function repairToClose()
    {

    }

    public function closeToClosed()
    {

    }

    /**
     * Estudiando si este flujo es necesario
     */
    public function repairToDiagnose() {}

    /**
     * Estudiando si este flujo es necesario
     */
    public function diagnoseToRepair() {}
}
