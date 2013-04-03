<?php

namespace Selhosa\RepairBundle\Creator;

use Selhosa\RepairBundle\Entity\Repair;
use Doctrine\ORM\EntityManager;

class MaterialCreator
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    /**
     * @param \Doctrine\ORM\EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function create(Repair $repair)
    {
        $materialCharges = $repair->getMaterialCharges();

        // foreach material
        foreach ($materialCharges as $materialCharge) {
            $materialCreated = $this->em->getRepository('SelhosaMaterialBundle:Material')->findOneBy(array('reference' => $materialCharge->getMaterial()->getReference()));
            if ($materialCreated) {
                $materialCharge->setMaterial($materialCreated);
                $materialCharge->setRepair($repair);
            } else {
                $materialCharge->setRepair($repair);
            }
        }

        // TODO check if any material have been removed
        // TODO find a charge with this material, remove from the repair charges
        // TODO take in consideration that a repair can have two times the same material

    }


}


