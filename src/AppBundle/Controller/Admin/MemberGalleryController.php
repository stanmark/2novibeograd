<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\MemberGallery;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Membergallery controller.
 *
 * @Route("membergallery")
 */
class MemberGalleryController extends Controller
{
    /**
     * Lists all memberGallery entities.
     *
     * @Route("/", name="membergallery_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $memberGalleries = $em->getRepository('AppBundle:MemberGallery')->findAll();

        return $this->render('@AppBundle/Resources/views/admin/membergallery/index.html.twig', array(
            'memberGalleries' => $memberGalleries,
        ));
    }

    /**
     * Creates a new memberGallery entity.
     *
     * @Route("/new", name="membergallery_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $memberGallery = new Membergallery();
        $form = $this->createForm('AppBundle\Form\MemberGalleryType', $memberGallery);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($memberGallery);
            $em->flush();

            return $this->redirectToRoute('membergallery_show', array('id' => $memberGallery->getId()));
        }

        return $this->render('@AppBundle/Resources/views/admin/membergallery/new.html.twig', array(
            'memberGallery' => $memberGallery,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a memberGallery entity.
     *
     * @Route("/{id}", name="membergallery_show")
     * @Method("GET")
     */
    public function showAction(MemberGallery $memberGallery)
    {
        $deleteForm = $this->createDeleteForm($memberGallery);

        return $this->render('@AppBundle/Resources/views/admin/membergallery/show.html.twig', array(
            'memberGallery' => $memberGallery,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing memberGallery entity.
     *
     * @Route("/{id}/edit", name="membergallery_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MemberGallery $memberGallery)
    {
        $deleteForm = $this->createDeleteForm($memberGallery);
        $editForm = $this->createForm('AppBundle\Form\MemberGalleryType', $memberGallery);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('membergallery_edit', array('id' => $memberGallery->getId()));
        }

        return $this->render('@AppBundle/Resources/views/admin/membergallery/edit.html.twig', array(
            'memberGallery' => $memberGallery,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a memberGallery entity.
     *
     * @Route("/{id}", name="membergallery_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MemberGallery $memberGallery)
    {
        $form = $this->createDeleteForm($memberGallery);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($memberGallery);
            $em->flush();
        }

        return $this->redirectToRoute('membergallery_index');
    }

    /**
     * Creates a form to delete a memberGallery entity.
     *
     * @param MemberGallery $memberGallery The memberGallery entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MemberGallery $memberGallery)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('membergallery_delete', array('id' => $memberGallery->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
