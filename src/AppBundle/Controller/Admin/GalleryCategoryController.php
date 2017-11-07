<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\GalleryCategory;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Gallerycategory controller.
 *
 */
class GalleryCategoryController extends Controller
{
    /**
     * Lists all galleryCategory entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $galleryCategories = $em->getRepository('AppBundle:GalleryCategory')->findAll();

        return $this->render('@AppBundle/Resources/views/admin/gallerycategory/index.html.twig', array(
            'galleryCategories' => $galleryCategories,
        ));
    }

    /**
     * Creates a new galleryCategory entity.
     *
     */
    public function newAction(Request $request)
    {
        $galleryCategory = new Gallerycategory();
        $form = $this->createForm('AppBundle\Form\GalleryCategoryType', $galleryCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($galleryCategory);
            $em->flush();

            return $this->redirectToRoute('gallerycategory_show', array('id' => $galleryCategory->getId()));
        }

        return $this->render('@AppBundle/Resources/views/admin/gallerycategory/new.html.twig', array(
            'galleryCategory' => $galleryCategory,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a galleryCategory entity.
     *
     */
    public function showAction(GalleryCategory $galleryCategory)
    {
        $deleteForm = $this->createDeleteForm($galleryCategory);

        return $this->render('@AppBundle/Resources/views/admin/gallerycategory/show.html.twig', array(
            'galleryCategory' => $galleryCategory,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing galleryCategory entity.
     *
     */
    public function editAction(Request $request, GalleryCategory $galleryCategory)
    {
        $deleteForm = $this->createDeleteForm($galleryCategory);
        $editForm = $this->createForm('AppBundle\Form\GalleryCategoryType', $galleryCategory);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('gallerycategory_edit', array('id' => $galleryCategory->getId()));
        }

        return $this->render('@AppBundle/Resources/views/admin/gallerycategory/edit.html.twig', array(
            'galleryCategory' => $galleryCategory,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a galleryCategory entity.
     *
     */
    public function deleteAction(Request $request, GalleryCategory $galleryCategory)
    {
//        $form = $this->createDeleteForm($galleryCategory);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($galleryCategory);
            $em->flush();
//        }

//        return $this->redirectToRoute('gallerycategory_index');
        return new Response (null, 204);
    }

    /**
     * Creates a form to delete a galleryCategory entity.
     *
     * @param GalleryCategory $galleryCategory The galleryCategory entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(GalleryCategory $galleryCategory)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('gallerycategory_delete', array('id' => $galleryCategory->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
