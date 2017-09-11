<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\LeagueGallery;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Leaguegallery controller.
 *
 * @Route("leaguegallery")
 */
class LeagueGalleryController extends Controller
{
    /**
     * Lists all leagueGallery entities.
     *
     * @Route("/", name="leaguegallery_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $leagueGalleries = $em->getRepository('AppBundle:LeagueGallery')->findAll();

        return $this->render('@AppBundle/Resources/views/admin/leaguegallery/index.html.twig', array(
            'leagueGalleries' => $leagueGalleries,
        ));
    }

    /**
     * Creates a new leagueGallery entity.
     *
     * @Route("/new", name="leaguegallery_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $leagueGallery = new Leaguegallery();
        $form = $this->createForm('AppBundle\Form\LeagueGalleryType', $leagueGallery);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($leagueGallery);
            $em->flush();

            return $this->redirectToRoute('leaguegallery_show', array('id' => $leagueGallery->getId()));
        }

        return $this->render('@AppBundle/Resources/views/admin/leaguegallery/new.html.twig', array(
            'leagueGallery' => $leagueGallery,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a leagueGallery entity.
     *
     * @Route("/{id}", name="leaguegallery_show")
     * @Method("GET")
     */
    public function showAction(LeagueGallery $leagueGallery)
    {
        $deleteForm = $this->createDeleteForm($leagueGallery);

        return $this->render('@AppBundle/Resources/views/admin/leaguegallery/show.html.twig', array(
            'leagueGallery' => $leagueGallery,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing leagueGallery entity.
     *
     * @Route("/{id}/edit", name="leaguegallery_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, LeagueGallery $leagueGallery)
    {
        $deleteForm = $this->createDeleteForm($leagueGallery);
        $editForm = $this->createForm('AppBundle\Form\LeagueGalleryType', $leagueGallery);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('leaguegallery_edit', array('id' => $leagueGallery->getId()));
        }

        return $this->render('@AppBundle/Resources/views/admin/leaguegallery/edit.html.twig', array(
            'leagueGallery' => $leagueGallery,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a leagueGallery entity.
     *
     * @Route("/{id}", name="leaguegallery_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, LeagueGallery $leagueGallery)
    {
        $form = $this->createDeleteForm($leagueGallery);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($leagueGallery);
            $em->flush();
        }

        return $this->redirectToRoute('leaguegallery_index');
    }

    /**
     * Creates a form to delete a leagueGallery entity.
     *
     * @param LeagueGallery $leagueGallery The leagueGallery entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(LeagueGallery $leagueGallery)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('leaguegallery_delete', array('id' => $leagueGallery->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
