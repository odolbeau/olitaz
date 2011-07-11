<?php

namespace Olitaz\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('OlitazHomeBundle:Default:index.html.twig');
    }

    public function presentationAction() {
        return $this->render('OlitazHomeBundle:Default:presentation.html.twig');
    }

    public function legalNoticesAction()
    {
        return $this->render('OlitazHomeBundle:Default:legal_notices.html.twig');
    }
}
