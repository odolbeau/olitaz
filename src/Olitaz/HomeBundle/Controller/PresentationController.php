<?php

namespace Olitaz\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PresentationController extends Controller
{
    
    public function presentationAction()
    {
        $response = $this->render('OlitazHomeBundle:Presentation:presentation.html.twig');
        $response->setSharedMaxAge(60*60*24*30); // 30 days
        $response->setPublic();

        return $response;
    }

    public function prestationsAction() {
        $response = $this->render('OlitazHomeBundle:Presentation:prestations.html.twig');
        $response->setSharedMaxAge(60*60*24*30); // 30 days
        $response->setPublic();

        return $response;
    }

    public function auditAction() {
        $response = $this->render('OlitazHomeBundle:Presentation:audit.html.twig');
        $response->setSharedMaxAge(60*60*24*30); // 30 days
        $response->setPublic();

        return $response;
    }

    public function developmentAction() {
        $response = $this->render('OlitazHomeBundle:Presentation:development.html.twig');
        $response->setSharedMaxAge(60*60*24*30); // 30 days
        $response->setPublic();

        return $response;
    }
}
