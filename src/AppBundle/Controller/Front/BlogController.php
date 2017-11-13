<?php

namespace AppBundle\Controller\Front;

use AppBundle\Entity\Blog;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\SEO;
use AppBundle\Entity\BreadCrumps;

/**
 * Place controller.
 *
 */
class BlogController extends Controller
{
    /**
     * Lists all place entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $AllBlog = $em->getRepository('AppBundle:Blog')->findAll();      
        $sEOs = $em->getRepository('AppBundle:SEO')->findAll();  
        $BreadCrumps = $em->getRepository('AppBundle:BreadCrumps')->findAll();
        
        
        return $this->render('@AppBundle/Resources/views/front/allblog.html.twig', array(
   
            'BreadCrumps' => $BreadCrumps,
            'sEOs' => $sEOs,
            'AllBlog' => $AllBlog,
            
        ));
    }

    public function detailAction(Blog $Blog, $slug)
    {
        $em = $this->getDoctrine()->getManager();
        

        $AllBlog = $em->getRepository(Blog::class);
        $Blog = $AllBlog->findOneBy(['slug' => $slug]);
        $sEOs = $em->getRepository('AppBundle:SEO')->findAll();       
        $BreadCrumps = $em->getRepository('AppBundle:BreadCrumps')->findAll();

        return $this->render('@AppBundle/Resources/views/front/blog.html.twig', array(  
            'Blog' => $Blog,           
            'sEOs' => $sEOs,
            'BreadCrumps' => $BreadCrumps,
            
        ));
    }
}
