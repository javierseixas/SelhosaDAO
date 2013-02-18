<?php

namespace Selhosa\WorkBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Selhosa\RepairBundle\Entity\Repair;
use Selhosa\WorkBundle\Entity\WorkOrderStatus;
use Selhosa\WorkBundle\Manager\WorkOrderStatusManager;
use Symfony\Component\HttpFoundation\JsonResponse;

class WorkflowController extends Controller
{
    public function changeStatusAction()
    {

        $request = $this->getRequest();

        $id = (int)$request->get('workorderid');
        $metadata = json_decode($request->get('metadata'));
        $workorder = $this->getDoctrine()->getManager()->getRepository('SelhosaWorkBundle:WorkOrder')->find($id);

        $manager = new WorkOrderStatusManager($workorder, $this->getDoctrine()->getManager(), $this->get('security.context')->getToken()->getUser());

        $newStatusKeyword = $request->get('newstatuskeyword');

        call_user_func(array(
            $manager,
            $workorder->getCurrentStatus()->getKeyword() . 'To' . ucfirst($newStatusKeyword)
        ));

        return new JsonResponse(array('success' => true));
    }

}
