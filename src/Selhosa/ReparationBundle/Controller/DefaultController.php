<?php

namespace Selhosa\ReparationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SelhosaReparationBundle:Default:index.html.twig', array('name' => $name));
    }
}
