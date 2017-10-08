<?php

namespace AppBundle\Controller\Front;

use AppBundle\Entity\League;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\SEO;
use AppBundle\Entity\Groupp;
use AppBundle\Entity\Team;
use AppBundle\Entity\Game;

/**
 * League controller.
 *
 */
class GameController extends Controller
{

    
     public function detailAction($id, $name)
    {
        $em = $this->getDoctrine()->getManager();

        $leagues = $em->getRepository('AppBundle:League');
        $oneleague = $leagues->findOneBy(['id' => $id]);
        $sEOs = $em->getRepository('AppBundle:SEO')->findAll();
       
        $groupps = $em->getRepository('AppBundle:Groupp')->findBy(
                [ 'league' => $oneleague ]
                );
        $games = $em->getRepository('AppBundle:Game')->findAll();
        
 
        

        return $this->render('@AppBundle/Resources/views/front/game.html.twig.', array(           
            'groupps' =>$groupps,
            'games' => $games,
            'oneleague' => $oneleague,
            'sEOs' => $sEOs,
        ));
    }
}
