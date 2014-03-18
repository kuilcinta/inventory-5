<?php

namespace TomCan\CatalogueBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use TomCan\CatalogueBundle\Entity\SoftwareTitle;
use TomCan\CatalogueBundle\Form\SoftwareTitleType;

/**
 * SoftwareTitle controller.
 *
 */
class SoftwareTitleController extends Controller
{

    /**
     * Lists all SoftwareTitle entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CatalogueBundle:SoftwareTitle')->findOrdered(array(), array(array("v.name", "ASC")));

        return $this->render('CatalogueBundle:SoftwareTitle:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new SoftwareTitle entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new SoftwareTitle();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('software_show', array('id' => $entity->getId())));
        }

        return $this->render('CatalogueBundle:SoftwareTitle:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a SoftwareTitle entity.
    *
    * @param SoftwareTitle $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(SoftwareTitle $entity)
    {
        $form = $this->createForm(new SoftwareTitleType(), $entity, array(
            'action' => $this->generateUrl('software_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new SoftwareTitle entity.
     *
     */
    public function newAction()
    {
        $entity = new SoftwareTitle();
        $form   = $this->createCreateForm($entity);

        return $this->render('CatalogueBundle:SoftwareTitle:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SoftwareTitle entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CatalogueBundle:SoftwareTitle')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SoftwareTitle entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CatalogueBundle:SoftwareTitle:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing SoftwareTitle entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CatalogueBundle:SoftwareTitle')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SoftwareTitle entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CatalogueBundle:SoftwareTitle:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a SoftwareTitle entity.
    *
    * @param SoftwareTitle $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(SoftwareTitle $entity)
    {
        $form = $this->createForm(new SoftwareTitleType(), $entity, array(
            'action' => $this->generateUrl('software_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing SoftwareTitle entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CatalogueBundle:SoftwareTitle')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SoftwareTitle entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('software_edit', array('id' => $id)));
        }

        return $this->render('CatalogueBundle:SoftwareTitle:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a SoftwareTitle entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CatalogueBundle:SoftwareTitle')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find SoftwareTitle entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('software'));
    }

    /**
     * Creates a form to delete a SoftwareTitle entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('software_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
