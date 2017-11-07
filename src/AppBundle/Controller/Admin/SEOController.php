<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\SEO;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Seo controller.
 *
 */
class SEOController extends Controller
{
    /**
     * Lists all sEO entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sEOs = $em->getRepository('AppBundle:SEO')->findAll();

        return $this->render('@AppBundle/Resources/views/admin/seo/index.html.twig', array(
            'sEOs' => $sEOs,
        ));
    }

    /**
     * Creates a new sEO entity.
     *
     */
    public function newAction(Request $request)
    {
        $sEO = new Seo();
        $form = $this->createForm('AppBundle\Form\SEOType', $sEO);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sEO);
            $em->flush();

            return $this->redirectToRoute('seo_show', array('id' => $sEO->getId()));
        }

        return $this->render('@AppBundle/Resources/views/admin/seo/new.html.twig', array(
            'sEO' => $sEO,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a sEO entity.
     *
     */
    public function showAction(SEO $sEO)
    {
        $deleteForm = $this->createDeleteForm($sEO);

        return $this->render('@AppBundle/Resources/views/admin/seo/show.html.twig', array(
            'sEO' => $sEO,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing sEO entity.
     *
     */
    public function editAction(Request $request, SEO $sEO)
    {
        $deleteForm = $this->createDeleteForm($sEO);
        $editForm = $this->createForm('AppBundle\Form\SEOType', $sEO);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('seo_edit', array('id' => $sEO->getId()));
        }

        return $this->render('@AppBundle/Resources/views/admin/seo/edit.html.twig', array(
            'sEO' => $sEO,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a sEO entity.
     *
     */
    public function deleteAction(Request $request, SEO $sEO)
    {
//        $form = $this->createDeleteForm($sEO);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($sEO);
            $em->flush();
//        }
//
//        return $this->redirectToRoute('seo_index');
            return new Response (null, 204);
    }

    /**
     * Creates a form to delete a sEO entity.
     *
     * @param SEO $sEO The sEO entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SEO $sEO)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('seo_delete', array('id' => $sEO->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
