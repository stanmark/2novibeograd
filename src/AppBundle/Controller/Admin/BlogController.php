<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\Blog;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Blog controller.
 *
 */
class BlogController extends Controller
{
    /**
     * Lists all blog entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $blogs = $em->getRepository('AppBundle:Blog')->findAll();

        return $this->render('@AppBundle/Resources/views/admin/blog/index.html.twig', array(
            'blogs' => $blogs,
        ));
    }

    /**
     * Creates a new blog entity.
     *
     */
    public function newAction(Request $request)
    {
        $blog = new Blog();
        $form = $this->createForm('AppBundle\Form\BlogType', $blog);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($blog);
            $em->flush();

            return $this->redirectToRoute('blog_show', array('slug' => $blog->getSlug()));
        }

        return $this->render('@AppBundle/Resources/views/admin/blog/new.html.twig', array(
            'blog' => $blog,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a blog entity.
     *
     */
    public function showAction(Blog $blog)
    {
        $deleteForm = $this->createDeleteForm($blog);

        return $this->render('@AppBundle/Resources/views/admin/blog/show.html.twig', array(
            'blog' => $blog,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing blog entity.
     *
     */
    public function editAction(Request $request, Blog $blog)
    {
        $deleteForm = $this->createDeleteForm($blog);
        $editForm = $this->createForm('AppBundle\Form\BlogType', $blog);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('blog_edit', array('slug' => $blog->getSlug()));
        }

        return $this->render('@AppBundle/Resources/views/admin/blog/edit.html.twig', array(
            'blog' => $blog,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a blog entity.
     *
     */
    public function deleteAction(Request $request, Blog $blog)
    {
       
            $em = $this->getDoctrine()->getManager();
            $em->remove($blog);
            $em->flush();
    

        return new Response (null, 204);
    }

    /**
     * Creates a form to delete a blog entity.
     *
     * @param Blog $blog The blog entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Blog $blog)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blog_delete', array('slug' => $blog->getSlug())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
