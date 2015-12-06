<?php

namespace Miw\ClubPadelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MiwClubPadelBundle:Default:index.html.twig', array('name' => $name));
    }
}
