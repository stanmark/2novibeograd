<?php

namespace AppBundle\Controller\Front;

use AppBundle\Entity\teamMember;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\SEO;
use AppBundle\Entity\BreadCrumps;

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
        $BreadCrumps = $em->getRepository('AppBundle:BreadCrumps')->findAll();
        

        return $this->render('@AppBundle/Resources/views/front/teams-single.html.twig', array(
            'teamMembers' => $teamMembers,
            'sEOs' => $sEOs,
            'BreadCrumps' => $BreadCrumps
        ));
    }
    
    
    
    public function detailAction(teamMember $teamMember, $slug)
    {
        $em = $this->getDoctrine()->getManager();
        

        $member = $em->getRepository(teamMember::class);
        $oneMember = $member->findOneBy(['slug' => $slug]);
        $sEOs = $em->getRepository('AppBundle:SEO')->findAll();
        $BreadCrumps = $em->getRepository('AppBundle:BreadCrumps')->findAll();

        return $this->render('@AppBundle/Resources/views/front/teams-member.html.twig', array(
            'oneMember' => $oneMember,
            'sEOs' => $sEOs,
            'BreadCrumps' => $BreadCrumps
            
        ));
    }
}
