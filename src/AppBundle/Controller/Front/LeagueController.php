<?php

namespace AppBundle\Controller\Front;

use AppBundle\Entity\League;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\SEO;

/**
 * League controller.
 *
 */
class LeagueController extends Controller
{
    /**
     * Lists all league entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $leagues = $em->getRepository('AppBundle:League')->findAll();
        $sEOs = $em->getRepository('AppBundle:SEO')->findAll();

        return $this->render('@AppBundle/Resources/views/front/allleague.html.twig.', array(
            'leagues' => $leagues,
            'sEOs' => $sEOs,
        ));
    }
    
     public function detailAction($id, $name)
    {
        $em = $this->getDoctrine()->getManager();

        $oneleague = $em->getRepository('AppBundle:League')->findOneBy(['id' => $id]);
        
        $sEOs = $em->getRepository('AppBundle:SEO')->findAll();

        return $this->render('@AppBundle/Resources/views/front/league.html.twig.', array( 
            'oneleague' => $oneleague,
            'sEOs' => $sEOs,
        ));       
    }  
}

