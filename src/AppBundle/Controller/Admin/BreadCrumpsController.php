<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\BreadCrumps;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Breadcrump controller.
 *
 */
class BreadCrumpsController extends Controller
{
    /**
     * Lists all breadCrump entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $breadCrumps = $em->getRepository('AppBundle:BreadCrumps')->findAll();

        return $this->render('@AppBundle/Resources/views/admin/breadcrumps/index.html.twig', array(
            'breadCrumps' => $breadCrumps,
        ));
    }

    /**
     * Creates a new breadCrump entity.
     *
     */
    public function newAction(Request $request)
    {
        $breadCrump = new Breadcrumps();
        $form = $this->createForm('AppBundle\Form\BreadCrumpsType', $breadCrump);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($breadCrump);
            $em->flush();

            return $this->redirectToRoute('breadcrumps_show', array('slug' => $breadCrump->getSlug()));
        }

        return $this->render('@AppBundle/Resources/views/admin/breadcrumps/new.html.twig', array(
            'breadCrump' => $breadCrump,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a breadCrump entity.
     *
     */
    public function showAction(BreadCrumps $breadCrump)
    {
        $deleteForm = $this->createDeleteForm($breadCrump);

        return $this->render('@AppBundle/Resources/views/admin/breadcrumps/show.html.twig', array(
            'breadCrump' => $breadCrump,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing breadCrump entity.
     *
     */
    public function editAction(Request $request, BreadCrumps $breadCrump)
    {
        $deleteForm = $this->createDeleteForm($breadCrump);
        $editForm = $this->createForm('AppBundle\Form\BreadCrumpsType', $breadCrump);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('breadcrumps_edit', array('slug' => $breadCrump->getslug()));
        }

        return $this->render('@AppBundle/Resources/views/admin/breadcrumps/edit.html.twig', array(
            'breadCrump' => $breadCrump,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a breadCrump entity.
     *
     */
    public function deleteAction(Request $request, BreadCrumps $breadCrump)
    {
      
            $em = $this->getDoctrine()->getManager();
            $em->remove($breadCrump);
            $em->flush();
       return new Response (null, 204);
    }

    /**
     * Creates a form to delete a breadCrump entity.
     *
     * @param BreadCrumps $breadCrump The breadCrump entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(BreadCrumps $breadCrump)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('breadcrumps_delete', array('slug' => $breadCrump->getslug())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
