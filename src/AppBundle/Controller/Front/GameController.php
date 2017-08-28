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
        
 
        $niz = [];
        foreach ( $groupps as $groupp) {
            $teams = $em->getRepository('AppBundle:Team')->findBy(
                ['group' => $groupp ]
                );
            $games = $em->getRepository('AppBundle:Game')->findBy(
                ['groupp' => $groupp ]
                );
            
            
            $niz[] = [
                'group'=> $groupp, 
                'teams' => $teams,
                'games' => $games
                
            ];
            
               
            
        }
        

        return $this->render('@AppBundle/Resources/views/front/game.html.twig.', array(           
            'niz' => $niz,
            'games' => $games,
            'oneleague' => $oneleague,
            'sEOs' => $sEOs,
        ));
    }
}
