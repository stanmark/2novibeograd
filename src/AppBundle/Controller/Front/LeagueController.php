<?php

namespace AppBundle\Controller\Front;

use AppBundle\Entity\League;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\SEO;
use AppBundle\Entity\Groupp;
use AppBundle\Entity\Team;
use AppBundle\Entity\Game;
use AppBundle\Entity\Round;

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

        $leagues = $em->getRepository('AppBundle:League');
        $oneleague = $leagues->findOneBy(['id' => $id]);
        $sEOs = $em->getRepository('AppBundle:SEO')->findAll();
       
        $groupps = $em->getRepository('AppBundle:Groupp')->findBy(
                [ 'league' => $oneleague ]
                );
       $games = $em->getRepository('AppBundle:Game')->findBy(
                [ 'groupp' => $groupps ]
                );
        $rounds = $em->getRepository('AppBundle:Round')->findAll();

        return $this->render('@AppBundle/Resources/views/front/league.html.twig.', array( 
            'rounds' =>$rounds,
            'groupps' => $groupps,
            'games' => $games,
            'oneleague' => $oneleague,
            'sEOs' => $sEOs,
        ));   
        
       
    }
  
    
    
}

