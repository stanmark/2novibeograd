<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\HomeSlider;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Homeslider controller.
 *
 */
class HomeSliderController extends Controller
{
    /**
     * Lists all homeSlider entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $homeSliders = $em->getRepository('AppBundle:HomeSlider')->findAll();

        return $this->render('@AppBundle/Resources/views/admin/homeslider/index.html.twig', array(
            'homeSliders' => $homeSliders,
        ));
        
    }

    /**
     * Creates a new homeSlider entity.
     *
     */
    public function newAction(Request $request)
    {
        $homeSlider = new Homeslider();
        $form = $this->createForm('AppBundle\Form\HomeSliderType', $homeSlider);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($homeSlider);
            $em->flush();

            return $this->redirectToRoute('homeslider_show', array('slug' => $homeSlider->getslug()));
        }

        return $this->render('@AppBundle/Resources/views/admin/homeslider/new.html.twig', array(
            'homeSlider' => $homeSlider,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a homeSlider entity.
     *
     */
    public function showAction(HomeSlider $homeSlider)
    {
        $deleteForm = $this->createDeleteForm($homeSlider);

        return $this->render('@AppBundle/Resources/views/admin/homeslider/show.html.twig', array(
            'homeSlider' => $homeSlider,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing homeSlider entity.
     *
     */
    public function editAction(Request $request, HomeSlider $homeSlider)
    {
        $deleteForm = $this->createDeleteForm($homeSlider);
        $editForm = $this->createForm('AppBundle\Form\HomeSliderType', $homeSlider);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('homeslider_edit', array('slug' => $homeSlider->getSlug()));
        }

        return $this->render('@AppBundle/Resources/views/admin/homeslider/edit.html.twig', array(
            'homeSlider' => $homeSlider,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a homeSlider entity.
     *
     */
    public function deleteAction(Request $request, HomeSlider $homeSlider)
    {
//        $form = $this->createDeleteForm($homeSlider);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($homeSlider);
            $em->flush();
//        }
//
//        return $this->redirectToRoute('homeslider_index');
            return new Response (null, 204);
    }

    /**
     * Creates a form to delete a homeSlider entity.
     *
     * @param HomeSlider $homeSlider The homeSlider entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(HomeSlider $homeSlider)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('homeslider_delete', array('slug' => $homeSlider->getSlug())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
