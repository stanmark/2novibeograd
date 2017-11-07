<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\WhyUs;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Whyu controller.
 *
 */
class WhyUsController extends Controller
{
    /**
     * Lists all whyU entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $whyuses = $em->getRepository('AppBundle:WhyUs')->findAll();

        return $this->render('@AppBundle/Resources/views/admin/whyus/index.html.twig', array(
            'whyuses' => $whyuses,
        ));
    }

    /**
     * Creates a new whyU entity.
     *
     */
    public function newAction(Request $request)
    {
        $whyU = new WhyUs();
        $form = $this->createForm('AppBundle\Form\WhyUsType', $whyU);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($whyU);
            $em->flush();

            return $this->redirectToRoute('whyus_show', array('id' => $whyU->getId()));
        }

        return $this->render('@AppBundle/Resources/views/admin/whyus/new.html.twig', array(
            'whyU' => $whyU,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a whyU entity.
     *
     */
    public function showAction(WhyUs $whyU)
    {
        $deleteForm = $this->createDeleteForm($whyU);

        return $this->render('@AppBundle/Resources/views/admin/whyus/show.html.twig', array(
            'whyU' => $whyU,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing whyU entity.
     *
     */
    public function editAction(Request $request, WhyUs $whyU)
    {
        $deleteForm = $this->createDeleteForm($whyU);
        $editForm = $this->createForm('AppBundle\Form\WhyUsType', $whyU);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('whyus_edit', array('id' => $whyU->getId()));
        }

        return $this->render('@AppBundle/Resources/views/admin/whyus/edit.html.twig', array(
            'whyU' => $whyU,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a whyU entity.
     *
     */
    public function deleteAction(Request $request, WhyUs $whyU)
    {
//        $form = $this->createDeleteForm($whyU);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($whyU);
            $em->flush();
//        }
//
//        return $this->redirectToRoute('whyus_index');
            return new Response (null, 204);
    }

    /**
     * Creates a form to delete a whyU entity.
     *
     * @param WhyUs $whyU The whyU entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(WhyUs $whyU)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('whyus_delete', array('id' => $whyU->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
