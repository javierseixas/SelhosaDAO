<?php

namespace Selhosa\ReparationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Selhosa\ReparationBundle\Entity\DaoWorkOrder;
use Selhosa\ReparationBundle\Entity\WorkOrderStatus;
use Selhosa\ReparationBundle\Manager\WorkOrderStatusManager;
use Symfony\Component\HttpFoundation\JsonResponse;

class WorkFlowController extends Controller
{
    public function changeStatusAction()
    {

        $request = $this->getRequest();

        $id = (int)$request->get('workorderid');
        $workorder = $this->getDoctrine()->getManager()->getRepository('SelhosaReparationBundle:WorkOrder')->find($id);

        $manager = new WorkOrderStatusManager($workorder, $this->getDoctrine()->getManager());

        $newStatusKeyword = $request->get('newstatuskeyword');

        call_user_func(array(
            $manager,
            $workorder->getCurrentStatus()->getKeyword() . 'To' . ucfirst($newStatusKeyword)
        ));

        return new JsonResponse(array('success' => true));
    }

}
