<?php

namespace AppBundle\Controller\Front;

use AppBundle\Entity\HomeSlider;
use AppBundle\Entity\teamMember;
use AppBundle\Entity\WhyUs;
use AppBundle\Entity\MainGallery;
use AppBundle\Entity\OurServices;
use AppBundle\Entity\Blog;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\BreadCrumps;

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
        $whyuses = $em->getRepository('AppBundle:WhyUs')->findBy([], ['created' => 'ASC'], 3) ;
        $mainGallerys = $em->getRepository('AppBundle:MainGallery')->findAll();
        $ourServices = $em->getRepository('AppBundle:OurServices')->findAll();
        $teamMembers = $em->getRepository('AppBundle:teamMember')->findAll();
        $blogs = $em->getRepository('AppBundle:Blog')->findBy([], ['created' => 'ASC']) ;
        $BreadCrumps = $em->getRepository('AppBundle:BreadCrumps')->findAll();

        return $this->render('@AppBundle/Resources/views/front/home.html.twig', [
            'teamMembers' => $teamMembers,
            'ourServices' => $ourServices,
            'homeSliders' => $homeSliders,
            'whyuses' => $whyuses,
            'blogs' => $blogs,
            'mainGallerys' => $mainGallerys,
            'BreadCrumps' => $BreadCrumps
        ]);
    }
}
