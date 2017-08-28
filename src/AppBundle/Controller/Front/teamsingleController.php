<?php

namespace AppBundle\Controller\Front;

use AppBundle\Entity\teamMember;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\SEO;

/**
 * Team controller.
 *
 */
class teamsingleController extends Controller
{
    /**
     * Finds and displays one team.
     *
     */
     public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $teamMembers = $em->getRepository('AppBundle:teamMember')->findAll();
        $sEOs = $em->getRepository('AppBundle:SEO')->findAll();
        

        return $this->render('@AppBundle/Resources/views/front/teams-single.html.twig', array(
            'teamMembers' => $teamMembers,
            'sEOs' => $sEOs,
        ));
    }
}
