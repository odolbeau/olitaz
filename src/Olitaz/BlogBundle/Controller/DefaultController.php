<?php

namespace Olitaz\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('OlitazBlogBundle:Default:index.html.twig');
    }
}