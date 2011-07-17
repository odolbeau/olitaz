<?php

namespace Olitaz\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction()
    {
        $response = $this->render('OlitazHomeBundle:Default:index.html.twig');
        $response->setSharedMaxAge(60*60*24*30); // 30 days
        $response->setPublic();

        return $response;
    }

    public function presentationAction() {
        $response = $this->render('OlitazHomeBundle:Default:presentation.html.twig');
        $response->setSharedMaxAge(60*60*24*30); // 30 days
        $response->setPublic();

        return $response;
    }

    public function legalNoticesAction()
    {
        $response = $this->render('OlitazHomeBundle:Default:legal_notices.html.twig');
        $response->setSharedMaxAge(60*60*24*30); // 30 days
        $response->setPublic();

        return $response;
    }

    // ESIs
    public function newsAction()
    {
        $response = $this->render('OlitazHomeBundle:Default:news.html.twig');
        $response->setSharedMaxAge(60*60*24*1); // 1 day
        $response->setPublic();

        return $response;
    }
}
