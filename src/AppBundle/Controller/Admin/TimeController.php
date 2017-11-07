<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\Time;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Time controller.
 *
 */
class TimeController extends Controller
{
    /**
     * Lists all time entities.
     *

     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $times = $em->getRepository('AppBundle:Time')->findAll();

        return $this->render('@AppBundle/Resources/views/admin/time/index.html.twig', array(
            'times' => $times,
        ));
    }

    /**
     * Creates a new time entity.
     *

     */
    public function newAction(Request $request)
    {
        $time = new Time();
        $form = $this->createForm('AppBundle\Form\TimeType', $time);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($time);
            $em->flush();

            return $this->redirectToRoute('time_show', array('id' => $time->getId()));
        }

        return $this->render('@AppBundle/Resources/views/admin/time/new.html.twig', array(
            'time' => $time,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a time entity.
     *
     */
    public function showAction(Time $time)
    {
        $deleteForm = $this->createDeleteForm($time);

        return $this->render('@AppBundle/Resources/views/admin/time/show.html.twig', array(
            'time' => $time,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing time entity.
     *
     */
    public function editAction(Request $request, Time $time)
    {
        $deleteForm = $this->createDeleteForm($time);
        $editForm = $this->createForm('AppBundle\Form\TimeType', $time);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('time_edit', array('id' => $time->getId()));
        }

        return $this->render('@AppBundle/Resources/views/admin/time/edit.html.twig', array(
            'time' => $time,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a time entity.
     *
     */
    public function deleteAction(Request $request, Time $time)
    {
//        $form = $this->createDeleteForm($time);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($time);
            $em->flush();
//        }
//
//        return $this->redirectToRoute('time_index');
            return new Response (null, 204);
    }

    /**
     * Creates a form to delete a time entity.
     *
     * @param Time $time The time entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Time $time)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('time_delete', array('id' => $time->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
