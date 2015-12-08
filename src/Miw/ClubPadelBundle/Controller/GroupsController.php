<?php

namespace Miw\ClubPadelBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\FOSRestController;
use Miw\ClubPadelBundle\Entity\Groups;

/**
 * Groups controller.
 *
 */
class GroupsController extends FOSRestController {

    /**
     * Lists all Groups entities.
     */
    public function getAllAction() {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('MiwClubPadelBundle:Groups')->findAll();
        return $entities;
    }

    /**
     * Creates a new Groups entity.
     */
    public function createAction(Request $request) {
        $entity = new Groups();
        $entity->setName($request->get("name"));
        $entity->setRoles($request->get("roles"));
        $em = $this->getDoctrine()->getManager();
        $em->persist($entity);
        $em->flush();
        return $entity;
    }

    /**
     * Finds and displays a Groups entity.
     */
    public function getAction(Groups $group) {
        return $group;
    }

    /**
     * Edits an existing Groups entity.
     */
    public function updateAction(Request $request, Groups $group) {
        $em = $this->getDoctrine()->getManager();
        $em->getRepository('MiwClubPadelBundle:Groups');
        $group->setName($request->get("name"));
        $group->setRoles($request->get("roles"));
        $em->flush();
        return $group;
    }

    /**
     * Deletes a Groups entity.
     */
    public function deleteAction(Request $request, Groups $group) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($group);
        $em->flush();
    }

}
