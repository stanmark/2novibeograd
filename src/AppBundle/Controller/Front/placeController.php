<?php

namespace AppBundle\Controller\Front;

use AppBundle\Entity\place;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Time;
use AppBundle\Entity\BreadCrumps;

/**
 * Place controller.
 *
 */
class placeController extends Controller
{
    /**
     * Lists all place entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $places = $em->getRepository('AppBundle:place')->findAll();      
        $BreadCrumps = $em->getRepository('AppBundle:BreadCrumps')->findAll();
        
        
        return $this->render('@AppBundle/Resources/views/front/allplace.html.twig', array(
   
            'places' => $places,        
            'BreadCrumps' => $BreadCrumps,
            
        ));
    }

    public function detailAction(place $place, $slug)
    {
        $em = $this->getDoctrine()->getManager();
        

        $place = $em->getRepository(place::class);
        $onePlace = $place->findOneBy(['slug' => $slug]);     
        $times = $em->getRepository('AppBundle:Time')->findby(
                ['place' => $onePlace]);
        $BreadCrumps = $em->getRepository('AppBundle:BreadCrumps')->findAll();

        return $this->render('@AppBundle/Resources/views/front/place.html.twig', array(  
            'times' => $times,           
            'onePlace' => $onePlace,
            'BreadCrumps' => $BreadCrumps,
            
        ));
    }
}
