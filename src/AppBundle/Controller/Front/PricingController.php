<?php

namespace AppBundle\Controller\Front;

use AppBundle\Entity\Pricing;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\SEO;
use AppBundle\Entity\Features;
use AppBundle\Entity\BreadCrumps;

/**
 * Pricing controller.
 *
 */
class PricingController extends Controller {

    /**
     * Lists all pricing entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $pricings = $em->getRepository('AppBundle:Pricing')->findAll();
        $sEOs = $em->getRepository('AppBundle:SEO')->findAll();
        $featuress = $em->getRepository('AppBundle:Features')->findAll();
        $BreadCrumps = $em->getRepository('AppBundle:BreadCrumps')->findAll();


        return $this->render('@AppBundle/Resources/views/front/pricing.html.twig', array(
                    'featuress' => $featuress,
                    'pricings' => $pricings,
                    'sEOs' => $sEOs,
                    'BreadCrumps' => $BreadCrumps,
        ));
    }

}
