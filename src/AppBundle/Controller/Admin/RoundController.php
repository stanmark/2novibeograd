<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\Round;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Round controller.
 *
 */
class RoundController extends Controller
{
    /**
     * Lists all round entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $rounds = $em->getRepository('AppBundle:Round')->findAll();

        return $this->render('@AppBundle/Resources/views/admin/round/index.html.twig', array(
            'rounds' => $rounds,
        ));
    }

    /**
     * Creates a new round entity.
     *
     */
    public function newAction(Request $request)
    {
        $round = new Round();
        $form = $this->createForm('AppBundle\Form\RoundType', $round);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($round);
            $em->flush();

            return $this->redirectToRoute('round_show', array('slug' => $round->getSlug()));
        }

        return $this->render('@AppBundle/Resources/views/admin/round/new.html.twig', array(
            'round' => $round,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a round entity.
     *
     */
    public function showAction(Round $round)
    {
        $deleteForm = $this->createDeleteForm($round);

        return $this->render('@AppBundle/Resources/views/admin/round/show.html.twig', array(
            'round' => $round,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing round entity.
     *
     */
    public function editAction(Request $request, Round $round)
    {
        $deleteForm = $this->createDeleteForm($round);
        $editForm = $this->createForm('AppBundle\Form\RoundType', $round);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('round_edit', array('slug' => $round->getSlug()));
        }

        return $this->render('@AppBundle/Resources/views/admin/round/edit.html.twig', array(
            'round' => $round,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a round entity.
     *
     */
    public function deleteAction(Request $request, Round $round)
    {
        
            $em = $this->getDoctrine()->getManager();
            $em->remove($round);
            $em->flush();
      

        return new Response (null, 204);
    }

    /**
     * Creates a form to delete a round entity.
     *
     * @param Round $round The round entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Round $round)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('round_delete', array('slug' => $round->getSlug())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
