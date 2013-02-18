<?php

namespace Selhosa\WorkBundle\Manager;

use Selhosa\WorkBundle\Entity\WorkOrder;
use Doctrine\ORM\EntityManager;
use Selhosa\UserBundle\Entity\User;
use Selhosa\WorkBundle\Entity\WorkOrderStatusChange;

class WorkOrderStatusManager
{
    /**
     * @var \Selhosa\WorkBundle\Entity\WorkOrder $workorder
     */
    protected $workorder;

    /**
     * @var
     */
    protected $em;

    /**
     * @var \Selhosa\UserBundle\Entity\User
     */
    protected $currentUser;

    /**
     * @param \Selhosa\WorkBundle\Entity\WorkOrder $workorder
     * @param \Doctrine\ORM\EntityManager $em
     * @param \Selhosa\UserBundle\Entity\User $currentUser
     */
    function __construct(WorkOrder $workorder, EntityManager $em, User $user)
    {
        $this->workorder = $workorder;
        $this->em = $em;
        $this->currentUser = $user;
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

    public function repairToClose($metada)
    {

        if (isset($metada['intervention']))
            $this->chargeIntervention($metada['intervention']);
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
        $newStatus = $this->em->getRepository('SelhosaWorkBundle:WorkOrderStatus')->findOneByKeyword($statusKeyword);
        $statusChange = new WorkOrderStatusChange();
        $statusChange
            ->setWorkorder($this->workorder)
            ->setPreviousStatus($this->workorder->getCurrentStatus())
            ->setNewStatus($newStatus)
            ->setUser($this->currentUser)
        ;
        $this->workorder->setCurrentStatus($newStatus);
        $this->workorder->addStatusChange($statusChange);

        $this->em->persist($this->workorder);
        $this->em->flush();
    }

    protected function chargeIntervention($interventionId = null)
    {
        if (!$interventionId) { return; }

        $intervention = $this->em->getRepository('SelhosaRepairBundle:Intervention')->find($interventionId);

        if (!$intervention) { return; }

        $charge = new \Selhosa\RepairBundle\Entity\Charges();
        $charge->setIntervention($intervention);
        $charge->setRepair($this->workorder);

        $this->workorder->addCharge($charge);
    }
}
