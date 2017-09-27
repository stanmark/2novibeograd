<?php

namespace AppBundle\Controller\Front;

use AppBundle\Entity\HomeSlider;
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

        return $this->render('@AppBundle/Resources/views/front/home.html.twig', array(
            'homeSliders' => $homeSliders,
        ));
    }
}
