<?php

namespace TomCan\CatalogueBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use TomCan\CatalogueBundle\Entity\SoftwareCategory;
use TomCan\CatalogueBundle\Form\SoftwareCategoryType;

/**
 * SoftwareCategory controller.
 *
 */
class SoftwareCategoryController extends Controller
{

    /**
     * Lists all SoftwareCategory entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CatalogueBundle:SoftwareCategory')->findAll();

        return $this->render('CatalogueBundle:SoftwareCategory:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new SoftwareCategory entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new SoftwareCategory();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('softwarecategory_show', array('id' => $entity->getId())));
        }

        return $this->render('CatalogueBundle:SoftwareCategory:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a SoftwareCategory entity.
    *
    * @param SoftwareCategory $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(SoftwareCategory $entity)
    {
        $form = $this->createForm(new SoftwareCategoryType(), $entity, array(
            'action' => $this->generateUrl('softwarecategory_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new SoftwareCategory entity.
     *
     */
    public function newAction()
    {
        $entity = new SoftwareCategory();
        $form   = $this->createCreateForm($entity);

        return $this->render('CatalogueBundle:SoftwareCategory:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SoftwareCategory entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CatalogueBundle:SoftwareCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SoftwareCategory entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CatalogueBundle:SoftwareCategory:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing SoftwareCategory entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CatalogueBundle:SoftwareCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SoftwareCategory entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CatalogueBundle:SoftwareCategory:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a SoftwareCategory entity.
    *
    * @param SoftwareCategory $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(SoftwareCategory $entity)
    {
        $form = $this->createForm(new SoftwareCategoryType(), $entity, array(
            'action' => $this->generateUrl('softwarecategory_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing SoftwareCategory entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CatalogueBundle:SoftwareCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SoftwareCategory entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('softwarecategory_edit', array('id' => $id)));
        }

        return $this->render('CatalogueBundle:SoftwareCategory:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a SoftwareCategory entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CatalogueBundle:SoftwareCategory')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find SoftwareCategory entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('softwarecategory'));
    }

    /**
     * Creates a form to delete a SoftwareCategory entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('softwarecategory_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
