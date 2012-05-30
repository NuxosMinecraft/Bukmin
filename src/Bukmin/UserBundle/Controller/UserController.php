<?php

namespace Bukmin\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class UserController extends Controller
{
    
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('BukminUserBundle:User')->findAll();

        return $this->render('BukminUserBundle::index.html.twig', array(
            'entities' => $entities
        ));
    }
}
