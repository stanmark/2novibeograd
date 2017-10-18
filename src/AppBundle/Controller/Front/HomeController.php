<?php

namespace AppBundle\Controller\Front;

use AppBundle\Entity\HomeSlider;
use AppBundle\Entity\teamMember;
use AppBundle\Entity\WhyUs;
use AppBundle\Entity\MainGallery;
use AppBundle\Entity\OurServices;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Company controller.
 *
 */
class HomeController extends Controller
{
    /**
     * Home page
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $homeSliders = $em->getRepository('AppBundle:HomeSlider')->findAll();
        $whyuses = $em->getRepository('AppBundle:WhyUs')->findBy([], ['created' => 'DESC'], 3) ;
        $mainPictures = $em->getRepository('AppBundle:MainGallery')->getAllImagesWhereMainIsTrue();
        $ourServices = $em->getRepository('AppBundle:OurServices')->findAll();
        $teamMembers = $em->getRepository('AppBundle:teamMember')->findAll();
        

        return $this->render('@AppBundle/Resources/views/front/home.html.twig', array(
            'teamMembers' => $teamMembers,
            'ourServices' => $ourServices,
            'homeSliders' => $homeSliders,
            'whyuses' => $whyuses,
            'mainPictures' => $mainPictures
        ));
    }
}
