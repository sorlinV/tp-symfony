<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;

class LayoutController extends Controller
{   
    /**
     * @Route("/layout", name="layout")
     */
    public function numberAction()
    {
        return $this->render('AppBundle::layout.html.twig');
    }
}