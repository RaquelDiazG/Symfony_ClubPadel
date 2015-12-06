<?php

namespace Miw\ClubPadelBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Miw\ClubPadelBundle\Entity\Courts;
use Miw\ClubPadelBundle\Form\CourtsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * Courts controller.
 *
 */
class CourtsController extends FOSRestController {

    /**
     * Lists all Courts entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MiwClubPadelBundle:Courts')->findAll();

//        return $this->render('MiwClubPadelBundle:Courts:index.html.twig', array(
//                    'entities' => $entities,
//        ));
        return $entities;
    }

    /**
     * Creates a new Courts entity.
     *
     */
    public function createAction(Request $request) {
        $entity = new Courts();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('court_show', array('id' => $entity->getId())));
        }

        return $this->render('MiwClubPadelBundle:Courts:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Courts entity.
     *
     * @param Courts $entity The entity
     *
     * @return Form The form
     */
    private function createCreateForm(Courts $entity) {
        $form = $this->createForm(new CourtsType(), $entity, array(
            'action' => $this->generateUrl('court_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Courts entity.
     *
     */
    public function newAction() {
        $entity = new Courts();
        $form = $this->createCreateForm($entity);

        return $this->render('MiwClubPadelBundle:Courts:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Courts entity.
     */
    public function showAction(Courts $court) {
//        $em = $this->getDoctrine()->getManager();
//
//        $entity = $em->getRepository('MiwClubPadelBundle:Courts')->find($id);
//
//        if (!$entity) {
//            throw $this->createNotFoundException('Unable to find Courts entity.');
//        }
//
//        $deleteForm = $this->createDeleteForm($id);
//
//        return $this->render('MiwClubPadelBundle:Courts:show.html.twig', array(
//            'entity'      => $entity,
//            'delete_form' => $deleteForm->createView(),
//        ));
//        ----------------------------------------------------
//        //es necesario añadir en el comentario de la cabecera @Rest\View()
//        $view = $this->view($court, 200);
//        return $this->handleView($view);
//        ----------------------------------------------------
        return $court;
    }

    /**
     * Displays a form to edit an existing Courts entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MiwClubPadelBundle:Courts')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Courts entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('MiwClubPadelBundle:Courts:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Courts entity.
     *
     * @param Courts $entity The entity
     *
     * @return Form The form
     */
    private function createEditForm(Courts $entity) {
        $form = $this->createForm(new CourtsType(), $entity, array(
            'action' => $this->generateUrl('court_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Courts entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MiwClubPadelBundle:Courts')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Courts entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('court_edit', array('id' => $id)));
        }

        return $this->render('MiwClubPadelBundle:Courts:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Courts entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MiwClubPadelBundle:Courts')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Courts entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('court'));
    }

    /**
     * Creates a form to delete a Courts entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('court_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }

}
