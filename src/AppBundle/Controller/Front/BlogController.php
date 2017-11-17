<?php

namespace AppBundle\Controller\Front;

use AppBundle\Entity\Blog;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
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
        $AllBlog = $em->getRepository('AppBundle:Blog')->findby([], ['created' => 'DESC']);      
        $BreadCrumps = $em->getRepository('AppBundle:BreadCrumps')->findAll();
        
        
        return $this->render('@AppBundle/Resources/views/front/allblog.html.twig', array(
   
            'BreadCrumps' => $BreadCrumps,
            'AllBlog' => $AllBlog,
            
        ));
    }

    public function detailAction(Blog $Blog, $slug)
    {
        $em = $this->getDoctrine()->getManager();
        

        $AllBlog = $em->getRepository(Blog::class);
        $blog = $AllBlog->findOneBy(['slug' => $slug]);
        $blogs = $em->getRepository('AppBundle:Blog')->findAll();        
        $BreadCrumps = $em->getRepository('AppBundle:BreadCrumps')->findAll();

        return $this->render('@AppBundle/Resources/views/front/blog.html.twig', array(  
            'blogs' => $blogs, 
            'blog' => $blog,           
            'BreadCrumps' => $BreadCrumps,
            
        ));
    }
}
