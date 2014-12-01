<?php

namespace Hispavista\SolveMediaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('HispavistaSolveMediaBundle:Default:index.html.twig', array('name' => $name));
    }
}
