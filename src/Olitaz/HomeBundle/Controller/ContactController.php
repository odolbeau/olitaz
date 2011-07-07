<?php

namespace Olitaz\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ContactController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('OlitazHomeBundle:Contact:index.html.twig');
    }
}
