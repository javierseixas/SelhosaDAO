<?php

namespace Selhosa\ReparationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Selhosa\ReparationBundle\Entity\DaoWorkOrder;
use Selhosa\ReparationBundle\Entity\WorkOrderStatus;
use Selhosa\ReparationBundle\Form\Type\WorkorderType;
use Selhosa\ReparationBundle\Form\Type\Filter\ReparationWorkflowListFilterType;


class CrudController extends Controller
{
    public function indexAction($statusKeyword = 'diagnose')
    {
        $currentStatus = $this->getDoctrine()->getManager()->getRepository('SelhosaReparationBundle:WorkOrderStatus')->findOneByKeyword($statusKeyword);

        // TODO Check if the statusKeyword exists and throw Exception en case does not

        $filter = $this->createForm(new ReparationWorkflowListFilterType());

        $workorders = $this->get('reparation.workorder.list.filter')
            ->getResult($filter, $currentStatus->getId());

        $buttonsTemplate = $this->get('reparation.workflow.buttons.dumper')->getTemplate($statusKeyword);

        $technicians = $this->getDoctrine()->getManager()->getRepository('UserBundle:User')->findUsersByROLE('ROLE_TECHNICIAN');


        return $this->render('SelhosaReparationBundle:Crud:index.html.twig', array(
            'workorders' => $workorders,
            'buttonsTemplate' => $buttonsTemplate,
            'filter' => $filter->createView()
        ));
    }

    public function createAction()
    {
        $request = $this->getRequest();

        $workorder = new DaoWorkOrder();
        $status = $this->getDoctrine()->getManager()->getRepository('SelhosaReparationBundle:WorkOrderStatus')->find(10);
        $workorder->setCurrentStatus($status);

        $form = $this->createForm(new WorkorderType(),$workorder);

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($workorder);
                $em->flush();

                return $this->redirect($this->generateUrl('selhosa_reparation_homepage'));
            }
        }

        return $this->render('SelhosaReparationBundle:Crud:create.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function updateAction($id)
    {
        $request = $this->getRequest();

        $workorder = $this->getDoctrine()->getManager()->getRepository('SelhosaReparationBundle:DaoWorkOrder')->find($id);

        $form = $this->createForm(new WorkorderType(),$workorder);

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($workorder);
                $em->flush();

                return $this->redirect($this->generateUrl('selhosa_reparation_homepage'));
            }
        }

        return $this->render('SelhosaReparationBundle:Crud:update.html.twig', array(
            'form' => $form->createView(),
            'workorder' => $workorder
        ));
    }

    public function readAction($id)
    {
        $workorder = $this->getDoctrine()->getManager()->getRepository('SelhosaReparationBundle:DaoWorkOrder')->find($id);

        return $this->render('SelhosaReparationBundle:Crud:read.html.twig', array(
            'workorder' => $workorder
        ));
    }
}
