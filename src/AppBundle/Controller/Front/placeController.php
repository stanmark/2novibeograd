<?php

namespace AppBundle\Controller\Front;

use AppBundle\Entity\place;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\SEO;
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
        $sEOs = $em->getRepository('AppBundle:SEO')->findAll();  
        $BreadCrumps = $em->getRepository('AppBundle:BreadCrumps')->findAll();
        
        
        return $this->render('@AppBundle/Resources/views/front/allplace.html.twig', array(
   
            'places' => $places,        
            'sEOs' => $sEOs,
            'BreadCrumps' => $BreadCrumps,
            
        ));
    }

    public function detailAction($id, $name)
    {
        $em = $this->getDoctrine()->getManager();
        

        $place = $em->getRepository(place::class);
        $onePlace = $place->findOneBy(['id' => $id]);
        $sEOs = $em->getRepository('AppBundle:SEO')->findAll();       
        $times = $em->getRepository('AppBundle:Time')->findby(
                ['place' => $onePlace]);
        $BreadCrumps = $em->getRepository('AppBundle:BreadCrumps')->findAll();

        return $this->render('@AppBundle/Resources/views/front/place.html.twig', array(  
            'times' => $times,           
            'onePlace' => $onePlace,
            'sEOs' => $sEOs,
            'BreadCrumps' => $BreadCrumps,
            
        ));
    }
}
