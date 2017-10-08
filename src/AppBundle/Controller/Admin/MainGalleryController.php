<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\MainGallery;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Maingallery controller.
 *
 */
class MainGalleryController extends Controller
{
    /**
     * Lists all mainGallery entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $mainGalleries = $em->getRepository('AppBundle:MainGallery')->findAll();

        return $this->render('@AppBundle/Resources/views/admin/maingallery/index.html.twig', array(
            'mainGalleries' => $mainGalleries,
        ));
    }

    /**
     * Creates a new mainGallery entity.
     *
     */
    public function newAction(Request $request)
    {
        $mainGallery = new Maingallery();
        $form = $this->createForm('AppBundle\Form\MainGalleryType', $mainGallery);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mainGallery);
            $em->flush();

            return $this->redirectToRoute('maingallery_show', array('id' => $mainGallery->getId()));
        }

        return $this->render('@AppBundle/Resources/views/admin/maingallery/new.html.twig', array(
            'mainGallery' => $mainGallery,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a mainGallery entity.
     *
     */
    public function showAction(MainGallery $mainGallery)
    {
        $deleteForm = $this->createDeleteForm($mainGallery);

        return $this->render('@AppBundle/Resources/views/admin/maingallery/show.html.twig', array(
            'mainGallery' => $mainGallery,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing mainGallery entity.
     *
     */
    public function editAction(Request $request, MainGallery $mainGallery)
    {
        $deleteForm = $this->createDeleteForm($mainGallery);
        $editForm = $this->createForm('AppBundle\Form\MainGalleryType', $mainGallery);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('maingallery_edit', array('id' => $mainGallery->getId()));
        }

        return $this->render('@AppBundle/Resources/views/admin/maingallery/edit.html.twig', array(
            'mainGallery' => $mainGallery,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a mainGallery entity.
     *
     */
    public function deleteAction(Request $request, MainGallery $mainGallery)
    {
        $form = $this->createDeleteForm($mainGallery);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($mainGallery);
            $em->flush();
        }

        return $this->redirectToRoute('maingallery_index');
    }

    /**
     * Creates a form to delete a mainGallery entity.
     *
     * @param MainGallery $mainGallery The mainGallery entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MainGallery $mainGallery)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('maingallery_delete', array('id' => $mainGallery->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
