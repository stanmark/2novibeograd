<?php

namespace AppBundle\Controller\Front;

use AppBundle\Entity\MainGallery;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Maingallery controller.
 *
 */
class MainGalleryController extends Controller
{
    /**
     * Lists all mainGallery entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $mainGalleries = $em->getRepository('AppBundle:MainGallery')->findAll();

        return $this->render('@AppBundle/Resources/views/front/gallerys.html.twig', array(
            'mainGalleries' => $mainGalleries,
        ));
    }


    /**
     * 
     *
     */
    public function detailAction($id, $name)
    {
        $em = $this->getDoctrine()->getManager();
        

        $mainGallerys = $em->getRepository(MainGallery::class);
        $mainGallery = $mainGallerys->findOneBy(['id' => $id]);
       

        return $this->render('@AppBundle/Resources/views/front/place.html.twig', array(  
                  
            'mainGallery' => $mainGallery,

            
        ));
    }
}
