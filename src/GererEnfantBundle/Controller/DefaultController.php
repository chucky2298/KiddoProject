<?php

namespace GererEnfantBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GererEnfantBundle:Default:index.html.twig');
    }
}
