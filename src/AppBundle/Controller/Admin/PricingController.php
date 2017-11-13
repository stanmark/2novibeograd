<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\Pricing;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Pricing controller.
 *
 */
class PricingController extends Controller
{
    /**
     * Lists all pricing entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pricings = $em->getRepository('AppBundle:Pricing')->findAll();

        return $this->render('@AppBundle/Resources/views/admin/pricing/index.html.twig', array(
            'pricings' => $pricings,
        ));
    }

    /**
     * Creates a new pricing entity.
     *
     */
    public function newAction(Request $request)
    {
        $pricing = new Pricing();
        $form = $this->createForm('AppBundle\Form\PricingType', $pricing);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pricing);
            $em->flush();

            return $this->redirectToRoute('pricing_show', array('slug' => $pricing->getSlug()));
        }

        return $this->render('@AppBundle/Resources/views/admin/pricing/new.html.twig', array(
            'pricing' => $pricing,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a pricing entity.
     *
     */
    public function showAction(Pricing $pricing)
    {
        $deleteForm = $this->createDeleteForm($pricing);

        return $this->render('@AppBundle/Resources/views/admin/pricing/show.html.twig', array(
            'pricing' => $pricing,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing pricing entity.
     *
     */
    public function editAction(Request $request, Pricing $pricing)
    {
        $deleteForm = $this->createDeleteForm($pricing);
        $editForm = $this->createForm('AppBundle\Form\PricingType', $pricing);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pricing_edit', array('slug' => $pricing->getSlug()));
        }

        return $this->render('@AppBundle/Resources/views/admin/pricing/edit.html.twig', array(
            'pricing' => $pricing,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a pricing entity.
     *
     */
    public function deleteAction(Request $request, Pricing $pricing)
    {
//        $form = $this->createDeleteForm($pricing);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($pricing);
            $em->flush();
//        }
//
//        return $this->redirectToRoute('pricing_index');
            return new Response (null, 204);
    }

    /**
     * Creates a form to delete a pricing entity.
     *
     * @param Pricing $pricing The pricing entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Pricing $pricing)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pricing_delete', array('slug' => $pricing->getSlug())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
