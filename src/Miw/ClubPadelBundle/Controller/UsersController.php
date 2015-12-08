<?php

namespace Miw\ClubPadelBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\FOSRestController;
use Miw\ClubPadelBundle\Entity\Users;
use Miw\ClubPadelBundle\Form\UsersType;

/**
 * Users controller.
 *
 */
class UsersController extends FOSRestController {

    /**
     * Lists all Users entities.
     */
    public function getAllAction() {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('MiwClubPadelBundle:Users')->findAll();
        return $entities;
    }

    /**
     * Creates a new Users entity.
     */
    public function createAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $entity = new Users($request->get("username"), $request->get("email"), $request->get("password"));
        $entity->addGroup($em->getRepository('MiwClubPadelBundle:Groups')->find($request->get("group")));
        $entity->setRoles(explode(" ", $request->get("roles")));
        $em->persist($entity);
        $em->flush();
        return $entity;
    }

    /**
     * Finds and displays a Users entity.
     */
    public function getAction(Users $users) {
        return $users;
    }

    /**
     * Edits an existing Users entity.
     */
    public function updateAction(Request $request, Users $user) {
        $em = $this->getDoctrine()->getManager();
        $user->setUsername($request->get("username"));
        $user->setEmail($request->get("email"));
        $user->setPassword($request->get("password"));
        $user->addGroup($em->getRepository('MiwClubPadelBundle:Groups')->find($request->get("group")));
        $user->setRoles(explode(" ", $request->get("roles")));
        $em->flush();
        return $user;
    }

    /**
     * Deletes a Users entity.
     *
     */
    public function deleteAction(Users $user) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();
    }

}
