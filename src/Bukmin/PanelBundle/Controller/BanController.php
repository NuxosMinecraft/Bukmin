<?php

namespace Bukmin\PanelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Bukmin\PanelBundle\Entity\Ban;
use Bukmin\PanelBundle\Form\BanType;

/**
 * Ban controller.
 *
 */
class BanController extends Controller
{
    /**
     * Lists all Ban entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('BukminPanelBundle:Ban')->findAll();

        return $this->render('BukminPanelBundle:Ban:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Ban entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('BukminPanelBundle:Ban')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ban entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BukminPanelBundle:Ban:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new Ban entity.
     *
     */
    public function newAction()
    {
        $entity = new Ban();
        $form   = $this->createForm(new BanType(), $entity);

        return $this->render('BukminPanelBundle:Ban:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Ban entity.
     *
     */
    public function createAction()
    {
        $entity  = new Ban();
        $request = $this->getRequest();
        $form    = $this->createForm(new BanType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ban_show', array('id' => $entity->getId())));
            
        }

        return $this->render('BukminPanelBundle:Ban:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Ban entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('BukminPanelBundle:Ban')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ban entity.');
        }

        $editForm = $this->createForm(new BanType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BukminPanelBundle:Ban:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Ban entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('BukminPanelBundle:Ban')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ban entity.');
        }

        $editForm   = $this->createForm(new BanType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ban_edit', array('id' => $id)));
        }

        return $this->render('BukminPanelBundle:Ban:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Ban entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('BukminPanelBundle:Ban')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Ban entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ban'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
