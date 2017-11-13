<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\League;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * League controller.
 *
 */
class LeagueController extends Controller
{
    /**
     * Lists all league entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $leagues = $em->getRepository('AppBundle:League')->findAll();

        return $this->render('@AppBundle/Resources/views/admin/league/index.html.twig', array(
            'leagues' => $leagues,
        ));
    }

    /**
     * Creates a new league entity.
     *
     */
    public function newAction(Request $request)
    {
        $league = new League();
        $form = $this->createForm('AppBundle\Form\LeagueType', $league);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($league);
            $em->flush();

            return $this->redirectToRoute('league_show', array('slug' => $league->getSlug()));
        }

        return $this->render('@AppBundle/Resources/views/admin/league/new.html.twig', array(
            'league' => $league,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a league entity.
     *
     */
    public function showAction(League $league)
    {
        $deleteForm = $this->createDeleteForm($league);

        return $this->render('@AppBundle/Resources/views/admin/league/show.html.twig', array(
            'league' => $league,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing league entity.
     *
     */
    public function editAction(Request $request, League $league)
    {
        $deleteForm = $this->createDeleteForm($league);
        $editForm = $this->createForm('AppBundle\Form\LeagueType', $league);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('league_edit', array('slug' => $league->getSlug()));
        }

        return $this->render('@AppBundle/Resources/views/admin/league/edit.html.twig', array(
            'league' => $league,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a league entity.
     *
     */
    public function deleteAction(Request $request, League $league)
    {
//        $form = $this->createDeleteForm($league);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($league);
            $em->flush();
//        }
//
//        return $this->redirectToRoute('league_index');
            return new Response (null, 204);
    }

    /**
     * Creates a form to delete a league entity.
     *
     * @param League $league The league entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(League $league)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('league_delete', array('slug' => $league->getSlug())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
