<?php

namespace Selhosa\ReparationBundle\Manager;

use Selhosa\ReparationBundle\Entity\WorkOrder;
use Doctrine\ORM\EntityManager;

class WorkOrderStatusManager
{
    /**
     * @var \Selhosa\ReparationBundle\Entity\WorkOrder $workorder
     */
    protected $workorder;

    /**
     * @var
     */
    protected $em;

    /**
     * @param \Selhosa\ReparationBundle\Entity\WorkOrder $workorder
     * @param \Doctrine\ORM\EntityManager $em
     */
    function __construct(WorkOrder $workorder, EntityManager $em)
    {
        $this->workorder = $workorder;
        $this->em = $em;
    }

    public function diagnoseToOrderMaterial()
    {
        $this->changeWorkOrderStatus('orderMaterial');
    }

    public function diagnoseToClose()
    {
        $this->changeWorkOrderStatus('close');
    }

    public function orderMaterialToReceiveMaterial()
    {
        $this->changeWorkOrderStatus('receiveMaterial');
    }

    public function receiveMaterialToRepair()
    {
        $this->changeWorkOrderStatus('repair');
    }

    public function repairToOrderMaterial()
    {
        $this->changeWorkOrderStatus('orderMaterial');
    }

    public function repairToClose()
    {
        $this->changeWorkOrderStatus('close');
    }

    public function closeToClosed()
    {
        $this->changeWorkOrderStatus('closed');
    }

    /**
     * Estudiando si este flujo es necesario
     */
    public function repairToDiagnose() {}

    /**
     * Estudiando si este flujo es necesario
     */
    public function diagnoseToRepair() {}


    /**
     * @param $statusKeyword
     */
    protected function changeWorkOrderStatus($statusKeyword)
    {
        $newStatus = $this->em->getRepository('SelhosaReparationBundle:WorkOrderStatus')->findOneByKeyword($statusKeyword);
        $this->workorder->setCurrentStatus($newStatus);
        $this->em->persist($this->workorder);
        $this->em->flush();
    }
}
