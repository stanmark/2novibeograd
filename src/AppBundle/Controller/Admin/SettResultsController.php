<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\SettResults;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Settresult controller.
 *
 * @Route("settresults")
 */
class SettResultsController extends Controller
{
    /**
     * Lists all settResult entities.
     *
     * @Route("/", name="settresults_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settResults = $em->getRepository('AppBundle:SettResults')->findAll();

        return $this->render('@AppBundle/Resources/views/admin/settresults/index.html.twig', array(
            'settResults' => $settResults,
        ));
    }

    /**
     * Creates a new settResult entity.
     *
     * @Route("/new", name="settresults_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settResult = new Settresult();
        $form = $this->createForm('AppBundle\Form\SettResultsType', $settResult);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settResult);
            $em->flush();

            return $this->redirectToRoute('settresults_show', array('id' => $settResult->getId()));
        }

        return $this->render('@AppBundle/Resources/views/admin/settresults/new.html.twig', array(
            'settResult' => $settResult,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a settResult entity.
     *
     * @Route("/{id}", name="settresults_show")
     * @Method("GET")
     */
    public function showAction(SettResults $settResult)
    {
        $deleteForm = $this->createDeleteForm($settResult);

        return $this->render('@AppBundle/Resources/views/admin/settresults/show.html.twig', array(
            'settResult' => $settResult,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing settResult entity.
     *
     * @Route("/{id}/edit", name="settresults_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettResults $settResult)
    {
        $deleteForm = $this->createDeleteForm($settResult);
        $editForm = $this->createForm('AppBundle\Form\SettResultsType', $settResult);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('settresults_edit', array('id' => $settResult->getId()));
        }

        return $this->render('@AppBundle/Resources/views/admin/settresults/edit.html.twig', array(
            'settResult' => $settResult,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a settResult entity.
     *
     * @Route("/{id}", name="settresults_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettResults $settResult)
    {
        $form = $this->createDeleteForm($settResult);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settResult);
            $em->flush();
        }

        return $this->redirectToRoute('settresults_index');
    }

    /**
     * Creates a form to delete a settResult entity.
     *
     * @param SettResults $settResult The settResult entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettResults $settResult)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settresults_delete', array('id' => $settResult->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
