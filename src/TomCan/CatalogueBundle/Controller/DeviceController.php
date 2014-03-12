<?php

namespace TomCan\CatalogueBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use TomCan\CatalogueBundle\Entity\Device;
use TomCan\CatalogueBundle\Form\DeviceType;

/**
 * Device controller.
 *
 */
class DeviceController extends Controller
{

    /**
     * Lists all Device entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CatalogueBundle:Device')->findAll();

        return $this->render('CatalogueBundle:Device:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Device entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Device();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('devices_show', array('id' => $entity->getId())));
        }

        return $this->render('CatalogueBundle:Device:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Device entity.
    *
    * @param Device $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Device $entity)
    {
        $form = $this->createForm(new DeviceType(), $entity, array(
            'action' => $this->generateUrl('devices_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Device entity.
     *
     */
    public function newAction()
    {
        $entity = new Device();
        $form   = $this->createCreateForm($entity);

        return $this->render('CatalogueBundle:Device:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Device entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CatalogueBundle:Device')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Device entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CatalogueBundle:Device:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Device entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CatalogueBundle:Device')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Device entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CatalogueBundle:Device:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Device entity.
    *
    * @param Device $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Device $entity)
    {
        $form = $this->createForm(new DeviceType(), $entity, array(
            'action' => $this->generateUrl('devices_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Device entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CatalogueBundle:Device')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Device entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('devices_edit', array('id' => $id)));
        }

        return $this->render('CatalogueBundle:Device:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Device entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CatalogueBundle:Device')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Device entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('devices'));
    }

    /**
     * Creates a form to delete a Device entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('devices_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
