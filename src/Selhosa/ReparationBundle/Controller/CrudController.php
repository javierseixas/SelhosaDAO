<?php

namespace Selhosa\ReparationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Selhosa\ReparationBundle\Entity\DaoWorkOrder;
use Selhosa\ReparationBundle\Entity\WorkOrderStatus;


class CrudController extends Controller
{
    public function indexAction($statusId = 10)
    {

        $workorders = $this->getDoctrine()->getManager()->getRepository('SelhosaReparationBundle:DaoWorkOrder')->findByStatus($statusId);

        return $this->render('SelhosaReparationBundle:Crud:index.html.twig', array('workorders' => $workorders));
    }

    public function createAction()
    {
        $request = $this->getRequest();

        $workorder = new DaoWorkOrder();
        $status = $this->getDoctrine()->getManager()->getRepository('SelhosaReparationBundle:WorkOrderStatus')->find(10);
        $workorder->setCurrentStatus($status);

        $form = $this->createFormBuilder($workorder)
            ->add('reference', 'text')
            ->add('model', 'text', array(
                'required' => false
            ))
            ->add('priority', 'checkbox', array(
              'required' => false
            ))
            ->getForm();

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

        $form = $this->createFormBuilder($workorder)
            ->add('reference', 'text')
            ->add('model', 'text', array(
                'required' => false
            ))
            ->add('priority', 'checkbox', array(
              'required' => false
            ))
            ->getForm();

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
}
