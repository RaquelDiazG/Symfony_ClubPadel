<?php

namespace Miw\ClubPadelBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Miw\ClubPadelBundle\Entity\Courts;
use Symfony\Component\HttpFoundation\Request;

/**
 * Courts controller.
 *
 */
class CourtsController extends FOSRestController {

    /**
     * Lists all Courts entities.
     */
    public function getAllAction() {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('MiwClubPadelBundle:Courts')->findAll();
        return $entities;
    }

    /**
     * Creates a new Courts entity.
     */
    public function createAction(Request $request) {
        $court = new Courts();
        $court->setActive($request->get("active"));
        $em = $this->getDoctrine()->getManager();
        $em->persist($court);
        $em->flush();
        return $court;
    }

    /**
     * Finds and displays a Courts entity.
     */
    public function getAction(Courts $court) {
        return $court;
    }

    /**
     * Edits an existing Courts entity.
     */
    public function updateAction(Request $request, Courts $court) {
        $em = $this->getDoctrine()->getManager();
        $em->getRepository('MiwClubPadelBundle:Courts');
        $court->setActive($request->get("active"));
        $em->flush();
        return $court;
    }

    /**
     * Deletes a Courts entity.
     */
    public function deleteAction(Courts $court) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($court);
        $em->flush();
    }

}
