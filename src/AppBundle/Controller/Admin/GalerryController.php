<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\Galerry;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Galerry controller.
 *
 */
class GalerryController extends Controller
{
    /**
     * Lists all galerry entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $galerries = $em->getRepository('AppBundle:Galerry')->findAll();

        return $this->render('@AppBundle/Resources/views/admin/galerry/index.html.twig', array(
            'galerries' => $galerries,
        ));
    }

    /**
     * Creates a new galerry entity.
     *
     */
    public function newAction(Request $request)
    {
        $galerry = new Galerry();
        $form = $this->createForm('AppBundle\Form\GalerryType', $galerry);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($galerry);
            $em->flush();

            return $this->redirectToRoute('galerry_show', array('id' => $galerry->getId()));
        }

        return $this->render('@AppBundle/Resources/views/admin/galerry/new.html.twig', array(
            'galerry' => $galerry,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a galerry entity.
     *
     */
    public function showAction(Galerry $galerry)
    {
        $deleteForm = $this->createDeleteForm($galerry);

        return $this->render('@AppBundle/Resources/views/admin/galerry/show.html.twig', array(
            'galerry' => $galerry,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing galerry entity.
     *
     */
    public function editAction(Request $request, Galerry $galerry)
    {
        $deleteForm = $this->createDeleteForm($galerry);
        $editForm = $this->createForm('AppBundle\Form\GalerryType', $galerry);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('galerry_edit', array('id' => $galerry->getId()));
        }

        return $this->render('@AppBundle/Resources/views/admin/galerry/edit.html.twig', array(
            'galerry' => $galerry,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a galerry entity.
     *
     */
    public function deleteAction(Request $request, Galerry $galerry)
    {
        $form = $this->createDeleteForm($galerry);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($galerry);
            $em->flush();
        }

        return $this->redirectToRoute('galerry_index');
    }

    /**
     * Creates a form to delete a galerry entity.
     *
     * @param Galerry $galerry The galerry entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Galerry $galerry)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('galerry_delete', array('id' => $galerry->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
