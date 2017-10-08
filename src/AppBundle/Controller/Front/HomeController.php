<?php

namespace AppBundle\Controller\Front;

use AppBundle\Entity\HomeSlider;
use AppBundle\Entity\WhyUs;
use AppBundle\Entity\MainGallery;
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

        return $this->render('@AppBundle/Resources/views/front/home.html.twig', array(
            'homeSliders' => $homeSliders,
            'whyuses' => $whyuses,
            'mainPictures' => $mainPictures
        ));
    }
}
