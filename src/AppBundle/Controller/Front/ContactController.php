<?php

namespace AppBundle\Controller\Front;

use AppBundle\Entity\Company;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\BreadCrumps;

/**
 * Company controller.
 *
 */
class ContactController extends Controller
{
    /**
     * Lists all company entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $companies = $em->getRepository('AppBundle:Company')->findAll();
        $BreadCrumps = $em->getRepository('AppBundle:BreadCrumps')->findAll();

        return $this->render('@AppBundle/Resources/views/front/contact.html.twig', array(
            'companies' => $companies,
            'BreadCrumps' => $BreadCrumps,
        ));
    }
}
