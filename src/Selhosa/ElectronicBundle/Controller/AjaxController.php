<?php

namespace Selhosa\ElectronicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class AjaxController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getElectronicCategoriesAction()
    {
        $categories = $this->getDoctrine()->getManager()->getRepository('SelhosaElectronicBundle:ElectronicCategory')->findByBrand(1);

        return new JsonResponse(array(
            'success' => true,
            'data' => $categories
        ));;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function doesModelExistAction()
    {
        $model = $this->getRequest()->get('model');

        $electronic = $this->getDoctrine()->getManager()->getRepository('SelhosaElectronicBundle:Electronic')->findOneBy(array('model' => $model));

        $result = $electronic ? true : false;

        return new JsonResponse(array('exists' => $result));
    }
}
