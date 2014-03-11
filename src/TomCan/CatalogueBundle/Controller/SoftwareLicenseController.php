<?php

namespace TomCan\CatalogueBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use TomCan\CatalogueBundle\Entity\SoftwareLicense;
use TomCan\CatalogueBundle\Form\SoftwareLicenseType;

/**
 * SoftwareLicense controller.
 *
 */
class SoftwareLicenseController extends Controller
{

    /**
     * Lists all SoftwareLicense entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CatalogueBundle:SoftwareLicense')->findAll();

        return $this->render('CatalogueBundle:SoftwareLicense:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new SoftwareLicense entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new SoftwareLicense();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('software_licenses_show', array('id' => $entity->getId())));
        }

        return $this->render('CatalogueBundle:SoftwareLicense:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a SoftwareLicense entity.
    *
    * @param SoftwareLicense $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(SoftwareLicense $entity)
    {
        $form = $this->createForm(new SoftwareLicenseType(), $entity, array(
            'action' => $this->generateUrl('software_licenses_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new SoftwareLicense entity.
     *
     */
    public function newAction()
    {
        $entity = new SoftwareLicense();
        $form   = $this->createCreateForm($entity);

        return $this->render('CatalogueBundle:SoftwareLicense:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SoftwareLicense entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CatalogueBundle:SoftwareLicense')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SoftwareLicense entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CatalogueBundle:SoftwareLicense:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing SoftwareLicense entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CatalogueBundle:SoftwareLicense')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SoftwareLicense entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CatalogueBundle:SoftwareLicense:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a SoftwareLicense entity.
    *
    * @param SoftwareLicense $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(SoftwareLicense $entity)
    {
        $form = $this->createForm(new SoftwareLicenseType(), $entity, array(
            'action' => $this->generateUrl('software_licenses_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing SoftwareLicense entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CatalogueBundle:SoftwareLicense')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SoftwareLicense entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('software_licenses_edit', array('id' => $id)));
        }

        return $this->render('CatalogueBundle:SoftwareLicense:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a SoftwareLicense entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CatalogueBundle:SoftwareLicense')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find SoftwareLicense entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('software_licenses'));
    }

    /**
     * Creates a form to delete a SoftwareLicense entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('software_licenses_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
