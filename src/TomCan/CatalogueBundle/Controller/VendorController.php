<?php

namespace TomCan\CatalogueBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use TomCan\CatalogueBundle\Entity\Vendor;
use TomCan\CatalogueBundle\Form\VendorType;

/**
 * Vendor controller.
 *
 */
class VendorController extends Controller
{

    /**
     * Lists all Vendor entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CatalogueBundle:Vendor')->findAll();

        return $this->render('CatalogueBundle:Vendor:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Vendor entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Vendor();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('vendor_show', array('id' => $entity->getId())));
        }

        return $this->render('CatalogueBundle:Vendor:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Vendor entity.
    *
    * @param Vendor $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Vendor $entity)
    {
        $form = $this->createForm(new VendorType(), $entity, array(
            'action' => $this->generateUrl('vendor_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Vendor entity.
     *
     */
    public function newAction()
    {
        $entity = new Vendor();
        $form   = $this->createCreateForm($entity);

        return $this->render('CatalogueBundle:Vendor:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Vendor entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CatalogueBundle:Vendor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Vendor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CatalogueBundle:Vendor:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Vendor entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CatalogueBundle:Vendor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Vendor entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CatalogueBundle:Vendor:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Vendor entity.
    *
    * @param Vendor $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Vendor $entity)
    {
        $form = $this->createForm(new VendorType(), $entity, array(
            'action' => $this->generateUrl('vendor_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Vendor entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CatalogueBundle:Vendor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Vendor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('vendor_edit', array('id' => $id)));
        }

        return $this->render('CatalogueBundle:Vendor:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Vendor entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CatalogueBundle:Vendor')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Vendor entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('vendor'));
    }

    /**
     * Creates a form to delete a Vendor entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vendor_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
