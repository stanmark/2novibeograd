<?php

namespace AppBundle\Controller\Front;

use AppBundle\Entity\Pricing;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\SEO;
use AppBundle\Entity\Features;

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
        $sEOs = $em->getRepository('AppBundle:SEO')->findAll();
        $featuress = $em->getRepository('AppBundle:Features')->findAll();
        $fAQs = $em->getRepository('AppBundle:FAQ')->findBy(
                ['category' => 'cenovnik']
                );

        return $this->render('@AppBundle/Resources/views/front/pricing.html.twig', array(
            'featuress' => $featuress,
            'pricings' => $pricings,
            'sEOs' => $sEOs,
            'fAQs' => $fAQs,
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

            return $this->redirectToRoute('pricing_show', array('id' => $pricing->getId()));
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

            return $this->redirectToRoute('pricing_edit', array('id' => $pricing->getId()));
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
        $form = $this->createDeleteForm($pricing);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($pricing);
            $em->flush();
        }

        return $this->redirectToRoute('pricing_index');
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
            ->setAction($this->generateUrl('pricing_delete', array('id' => $pricing->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
