<?php

namespace Selhosa\RepairBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Selhosa\WorkBundle\Entity\WorkOrderStatus;
use Selhosa\RepairBundle\Form\Type\RepairMaterialChargesType;
use Selhosa\RepairBundle\Entity\Repair;
use Symfony\Component\HttpFoundation\JsonResponse;


class ChargeMaterialController extends Controller
{

    public function processFormAction($repairId)
    {
        if (false === $this->get('security.context')->isGranted('ROLE_TECHNICIAN')) {
            throw new AccessDeniedException();
        }

        $request = $this->getRequest();

        $repair = $this->getDoctrine()->getManager()->getRepository('SelhosaRepairBundle:Repair')->find($repairId);

        $originalMaterialsCharged = $repair->getMaterialCharges();

        $form = $this->createForm(new RepairMaterialChargesType($repairId),$repair);

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();

                $materialCreator = $this->get('selhosa.repair.material_creator');
                $materialCreator->create($repair);

                // filter $originalTags to contain tags no longer present
                foreach ($repair->getMaterialCharges() as $charge) {
                    foreach ($originalMaterialsCharged as $key => $toDel) {
                        if ($toDel->getId() === $charge->getId()) {
                            unset($originalMaterialsCharged[$key]);
                        }
                    }
                }

                foreach ($originalMaterialsCharged as $materialCharged) {
                    $repair->removeCharge($materialCharged);
                    $em->remove($materialCharged);
                }

                $em->persist($repair);
                $em->flush();

                return new JsonResponse(array('success' => true));
            }
        }

    }
}
