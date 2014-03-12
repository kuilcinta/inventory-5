<?php

namespace TomCan\CatalogueBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use TomCan\CatalogueBundle\Entity\DeviceType;
use TomCan\CatalogueBundle\Form\DeviceTypeType;

/**
 * DeviceType controller.
 *
 */
class DeviceTypeController extends Controller
{

    /**
     * Lists all DeviceType entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CatalogueBundle:DeviceType')->findAll();

        return $this->render('CatalogueBundle:DeviceType:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new DeviceType entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new DeviceType();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('devices_types_show', array('id' => $entity->getId())));
        }

        return $this->render('CatalogueBundle:DeviceType:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a DeviceType entity.
    *
    * @param DeviceType $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(DeviceType $entity)
    {
        $form = $this->createForm(new DeviceTypeType(), $entity, array(
            'action' => $this->generateUrl('devices_types_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new DeviceType entity.
     *
     */
    public function newAction()
    {
        $entity = new DeviceType();
        $form   = $this->createCreateForm($entity);

        return $this->render('CatalogueBundle:DeviceType:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a DeviceType entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CatalogueBundle:DeviceType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DeviceType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CatalogueBundle:DeviceType:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing DeviceType entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CatalogueBundle:DeviceType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DeviceType entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CatalogueBundle:DeviceType:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a DeviceType entity.
    *
    * @param DeviceType $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(DeviceType $entity)
    {
        $form = $this->createForm(new DeviceTypeType(), $entity, array(
            'action' => $this->generateUrl('devices_types_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing DeviceType entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CatalogueBundle:DeviceType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DeviceType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('devices_types_edit', array('id' => $id)));
        }

        return $this->render('CatalogueBundle:DeviceType:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a DeviceType entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CatalogueBundle:DeviceType')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find DeviceType entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('devices_types'));
    }

    /**
     * Creates a form to delete a DeviceType entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('devices_types_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
