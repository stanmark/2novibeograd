<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\FAQ;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Faq controller.
 *
 */
class FAQController extends Controller
{
    /**
     * Lists all fAQ entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $fAQs = $em->getRepository('AppBundle:FAQ')->findAll();

        return $this->render('faq/index.html.twig', array(
            'fAQs' => $fAQs,
        ));
    }

    /**
     * Creates a new fAQ entity.
     *
     */
    public function newAction(Request $request)
    {
        $fAQ = new Faq();
        $form = $this->createForm('AppBundle\Form\FAQType', $fAQ);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($fAQ);
            $em->flush();

            return $this->redirectToRoute('faq_show', array('id' => $fAQ->getId()));
        }

        return $this->render('faq/new.html.twig', array(
            'fAQ' => $fAQ,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a fAQ entity.
     *
     */
    public function showAction(FAQ $fAQ)
    {
        $deleteForm = $this->createDeleteForm($fAQ);

        return $this->render('faq/show.html.twig', array(
            'fAQ' => $fAQ,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing fAQ entity.
     *
     */
    public function editAction(Request $request, FAQ $fAQ)
    {
        $deleteForm = $this->createDeleteForm($fAQ);
        $editForm = $this->createForm('AppBundle\Form\FAQType', $fAQ);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('faq_edit', array('id' => $fAQ->getId()));
        }

        return $this->render('faq/edit.html.twig', array(
            'fAQ' => $fAQ,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a fAQ entity.
     *
     */
    public function deleteAction(Request $request, FAQ $fAQ)
    {
        $form = $this->createDeleteForm($fAQ);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($fAQ);
            $em->flush();
        }

        return $this->redirectToRoute('faq_index');
    }

    /**
     * Creates a form to delete a fAQ entity.
     *
     * @param FAQ $fAQ The fAQ entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(FAQ $fAQ)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('faq_delete', array('id' => $fAQ->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
