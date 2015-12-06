<?php

namespace Miw\ClubPadelBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Miw\ClubPadelBundle\Entity\Reservations;
use Miw\ClubPadelBundle\Form\ReservationsType;

/**
 * Reservations controller.
 *
 */
class ReservationsController extends Controller
{

    /**
     * Lists all Reservations entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MiwClubPadelBundle:Reservations')->findAll();

        return $this->render('MiwClubPadelBundle:Reservations:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Reservations entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Reservations();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('reservation_show', array('id' => $entity->getId())));
        }

        return $this->render('MiwClubPadelBundle:Reservations:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Reservations entity.
     *
     * @param Reservations $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Reservations $entity)
    {
        $form = $this->createForm(new ReservationsType(), $entity, array(
            'action' => $this->generateUrl('reservation_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Reservations entity.
     *
     */
    public function newAction()
    {
        $entity = new Reservations();
        $form   = $this->createCreateForm($entity);

        return $this->render('MiwClubPadelBundle:Reservations:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Reservations entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MiwClubPadelBundle:Reservations')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Reservations entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('MiwClubPadelBundle:Reservations:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Reservations entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MiwClubPadelBundle:Reservations')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Reservations entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('MiwClubPadelBundle:Reservations:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Reservations entity.
    *
    * @param Reservations $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Reservations $entity)
    {
        $form = $this->createForm(new ReservationsType(), $entity, array(
            'action' => $this->generateUrl('reservation_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Reservations entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MiwClubPadelBundle:Reservations')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Reservations entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('reservation_edit', array('id' => $id)));
        }

        return $this->render('MiwClubPadelBundle:Reservations:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Reservations entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MiwClubPadelBundle:Reservations')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Reservations entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('reservation'));
    }

    /**
     * Creates a form to delete a Reservations entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reservation_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
