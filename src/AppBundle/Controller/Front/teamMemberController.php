<?php

namespace AppBundle\Controller\Front;

use AppBundle\Entity\teamMember;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\SEO;

/**
 * Teammember controller.
 *
 */
class teamMemberController extends Controller
{
    /**
     * Finds and displays one teamMember.
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
    
    
    
    public function detailAction($id, $name)
    {
        $em = $this->getDoctrine()->getManager();
        

        $member = $em->getRepository(teamMember::class);
        $oneMember = $member->findOneBy(['id' => $id]);
        $sEOs = $em->getRepository('AppBundle:SEO')->findAll();

        return $this->render('@AppBundle/Resources/views/front/teams-member.html.twig', array(
            'oneMember' => $oneMember,
            'sEOs' => $sEOs,
            
        ));
    }
}
