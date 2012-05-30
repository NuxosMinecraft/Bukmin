<?php

namespace Bukmin\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * User controller.
 *
 */
class UserController extends Controller
{
    /**
     * Lists all User entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('BukminUserBundle:User')->findAll();

        return $this->render('BukminUserBundle::index.html.twig', array(
            'entities' => $entities
        ));
    }
}
