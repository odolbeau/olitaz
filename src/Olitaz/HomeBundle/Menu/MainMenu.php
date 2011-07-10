<?php

namespace Olitaz\HomeBundle\Menu;

use Knp\Bundle\MenuBundle\Menu;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Router;

class MainMenu extends Menu
{
    /**
     * @param Request $request
     * @param Router $router
     */
    public function __construct(Request $request, Router $router)
    {
        parent::__construct();

        $this->setCurrentUri($request->getRequestUri());

        $this->addChild('Home', $router->generate('OlitazHomeBundle_homepage'));
        $this->addChild('Présentation', $router->generate('OlitazHomeBundle_homepage'));
        $this->addChild('Prestations', $router->generate('OlitazHomeBundle_homepage'));
//        $this->addChild('Références', $router->generate('OlitazHomeBundle_homepage'));
        $this->addChild('Contact', $router->generate('OlitazHomeBundle_contact'));
        $this->addChild('Blog', 'http://blog.olitaz.fr/');
    }
}
