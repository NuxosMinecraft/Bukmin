<?php

namespace Bukmin\PanelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('BukminPanelBundle:Default:index.html.twig', array('name' => $name));
    }
}
