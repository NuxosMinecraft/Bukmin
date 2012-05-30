<?php

namespace Bukmin\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Bukmin\UserBundle\Entity\User;

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

        return $this->render('BukminUserBundle:User:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a User entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('BukminUserBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        return $this->render('BukminUserBundle:User:show.html.twig', array(
            'entity'      => $entity,
        ));
    }

}
