<?php

namespace Miw\ClubPadelBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Miw\ClubPadelBundle\Entity\Reservations;
use Miw\ClubPadelBundle\Form\ReservationsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Reservations controller.
 *
 */
class ReservationsController extends FOSRestController {

    /**
     * Lists all Reservations entities.
     */
    public function getAllAction() {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('MiwClubPadelBundle:Reservations')->findAll();
        return $entities;
    }

    /**
     * Creates a new Reservations entity.
     */
    public function createAction(Request $request) {
        $entity = new Reservations();
        $entity->setDatetime(new \DateTime($request->get("datetime")));
        $entity->setCourt($request->get("court"));
        $entity->setUser($request->get("user"));
        $em = $this->getDoctrine()->getManager();
        $em->persist($entity);
        $em->flush();
        return $entity;
    }

    /**
     * Finds and displays a Reservations entity.
     */
    public function getAction(Reservations $reservations) {
        return $reservations;
    }

    /**
     * Edits an existing Reservations entity.
     */
    public function updateAction(Request $request, Reservations $reservation) {
        $em = $this->getDoctrine()->getManager();
        $em->getRepository('MiwClubPadelBundle:Reservations');
        $reservation->setDatetime(new \DateTime($request->get("datetime")));
        $reservation->setCourt($request->get("court"));
        $reservation->setUser($request->get("user"));
        $em->flush();
        return $reservation;
    }

    /**
     * Deletes a Reservations entity.
     */
    public function deleteAction(Reservations $reservation) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($reservation);
        $em->flush();
    }

}
