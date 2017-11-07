<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\place;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Place controller.
 *
 */
class placeController extends Controller
{
    /**
     * Lists all place entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $places = $em->getRepository('AppBundle:place')->findAll();

        return $this->render('@AppBundle/Resources/views/admin/place/index.html.twig', array(
            'places' => $places,
        ));
    }

    /**
     * Creates a new place entity.
     *
     */
    public function newAction(Request $request)
    {
        $place = new Place();
        $form = $this->createForm('AppBundle\Form\placeType', $place);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($place);
            $em->flush();

            return $this->redirectToRoute('place_show', array('id' => $place->getId()));
        }

        return $this->render('@AppBundle/Resources/views/admin/place/new.html.twig', array(
            'place' => $place,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a place entity.
     *
     */
    public function showAction(place $place)
    {
        $deleteForm = $this->createDeleteForm($place);

        return $this->render('@AppBundle/Resources/views/admin/place/show.html.twig', array(
            'place' => $place,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing place entity.
     *
     */
    public function editAction(Request $request, place $place)
    {
        $deleteForm = $this->createDeleteForm($place);
        $editForm = $this->createForm('AppBundle\Form\placeType', $place);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('place_edit', array('id' => $place->getId()));
        }

        return $this->render('@AppBundle/Resources/views/admin/place/edit.html.twig', array(
            'place' => $place,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a place entity.
     *
     */
    public function deleteAction(Request $request, place $place)
    {
//        $form = $this->createDeleteForm($place);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($place);
            $em->flush();
//        }
//
//        return $this->redirectToRoute('place_index');
            return new Response (null, 204);
    }

    /**
     * Creates a form to delete a place entity.
     *
     * @param place $place The place entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(place $place)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('place_delete', array('id' => $place->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
