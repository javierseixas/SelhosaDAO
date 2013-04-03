<?php

namespace Selhosa\RepairBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Selhosa\RepairBundle\Entity\Repair;
use Selhosa\RepairBundle\Entity\DOARepair;
use Selhosa\WorkBundle\Entity\WorkOrderStatus;
use Selhosa\RepairBundle\Form\Type\WorkorderType;
use Selhosa\RepairBundle\Form\Type\DOARepairType;
use Selhosa\RepairBundle\Form\Type\Filter\ReparationWorkflowListFilterType;
use Selhosa\RepairBundle\Form\Type\RepairMaterialChargesType;


class CrudController extends Controller
{
    public function indexAction($statusKeyword = 'diagnose')
    {
        $currentStatus = $this->getDoctrine()->getManager()->getRepository('SelhosaWorkBundle:WorkOrderStatus')->findOneByKeyword($statusKeyword);

        // TODO Check if the statusKeyword exists and throw Exception en case does not

        $filter = $this->createForm(new ReparationWorkflowListFilterType());

        $repairs = $this->get('reparation.workorder.list.filter')
            ->getResult($filter, $currentStatus->getId());

        $chargeMaterialFormViews = array();
        foreach ($repairs as $repair) {
            $chargeMaterialFormViews[$repair->getId()] = $this->createForm(new RepairMaterialChargesType($repair->getId()), $repair)->createView();
        }

        $buttonsTemplate = $this->get('reparation.workflow.buttons.dumper')->getTemplate($statusKeyword);

        return $this->render('SelhosaRepairBundle:Crud:index.html.twig', array(
            'workorders' => $repairs,
            'buttonsTemplate' => $buttonsTemplate,
            'filter' => $filter->createView(),
            'currentStatus' => $currentStatus,
            'chargeMaterialFormViews' => $chargeMaterialFormViews
        ));
    }

    public function createAction()
    {
        if (false === $this->get('security.context')->isGranted('ROLE_MANAGER')) {
            throw new AccessDeniedException();
        }

        $request = $this->getRequest();

        $workorder = new DOARepair();
        $status = $this->getDoctrine()->getManager()->getRepository('SelhosaWorkBundle:WorkOrderStatus')->find(10);
        $workorder->setCurrentStatus($status);

        // TODO Pulir la manera como se recuperan los modelos. Probablemente no sea falta recuperar todos los objetos
        $models = $this->getDoctrine()->getManager()->getRepository('SelhosaElectronicBundle:Electronic')->findAllModels();

        $form = $this->createForm(new DOARepairType(),$workorder);

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {

                $electronicCreator = $this->get('selhosa.electronic.creator');
                $electronicCreator->create($workorder);

                $em = $this->getDoctrine()->getManager();
                $em->persist($workorder);
                $em->flush();

                return $this->redirect($this->generateUrl('selhosa_reparation_homepage'));
            }
        }

        return $this->render('SelhosaRepairBundle:Crud:create.html.twig', array(
            'form' => $form->createView(),
            'models' => $models
        ));
    }

    public function updateAction($id)
    {
        if (false === $this->get('security.context')->isGranted('ROLE_MANAGER')) {
            throw new AccessDeniedException();
        }

        $request = $this->getRequest();

        $workorder = $this->getDoctrine()->getManager()->getRepository('SelhosaRepairBundle:DOARepair')->find($id);

        $form = $this->createForm(new DOARepairType(),$workorder);

        // TODO Pulir la manera como se recuperan los modelos. Probablemente no sea falta recuperar todos los objetos
        $models = $this->getDoctrine()->getManager()->getRepository('SelhosaElectronicBundle:Electronic')->findAllModels();

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($workorder);
                $em->flush();

                return $this->redirect($this->generateUrl('selhosa_reparation_homepage'));
            }
        }

        return $this->render('SelhosaRepairBundle:Crud:update.html.twig', array(
            'form' => $form->createView(),
            'workorder' => $workorder,
            'models' => $models
        ));
    }

    public function readAction($id)
    {
        $workorder = $this->getDoctrine()->getManager()->getRepository('SelhosaRepairBundle:Repair')->find($id);

        return $this->render('SelhosaRepairBundle:Crud:read.html.twig', array(
            'workorder' => $workorder
        ));
    }
}
