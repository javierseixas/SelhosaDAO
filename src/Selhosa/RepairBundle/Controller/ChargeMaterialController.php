<?php

namespace Selhosa\RepairBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Selhosa\WorkBundle\Entity\WorkOrderStatus;
use Selhosa\RepairBundle\Form\Type\ChargeMaterialType;


class ChargeMaterialController extends Controller
{

    public function renderFormAction()
    {
        // TODO Falta seguridad
        //if (false === $this->get('security.context')->isGranted('ROLE_MANAGER')) {
        //    throw new AccessDeniedException();
        //}

        $request = $this->getRequest();

        // TODO Get current charged materials

        // TODO Pulir la manera como se recuperan los modelos. Probablemente no sea falta recuperar todos los objetos
        $models = $this->getDoctrine()->getManager()->getRepository('SelhosaElectronicBundle:Electronic')->findAllModels();

        $form = $this->createForm(new ChargeMaterialType());

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {

//                $electronicCreator = $this->get('selhosa.electronic.creator');
//                $electronicCreator->create($workorder);
//
//                $em = $this->getDoctrine()->getManager();
//                $em->persist($workorder);
//                $em->flush();

                return $this->redirect($this->generateUrl('selhosa_reparation_homepage'));
            }
        }

        return $this->render('SelhosaRepairBundle:ChargeMaterialModal:form.html.twig', array(
            'form' => $form->createView(),
            'models' => $models
        ));
    }
}
