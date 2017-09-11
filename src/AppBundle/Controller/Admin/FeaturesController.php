<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\Features;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Feature controller.
 *
 * @Route("features")
 */
class FeaturesController extends Controller
{
    /**
     * Lists all feature entities.
     *
     * @Route("/", name="features_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $features = $em->getRepository('AppBundle:Features')->findAll();

        return $this->render('@AppBundle/Resources/views/admin/features/index.html.twig', array(
            'features' => $features,
        ));
    }

    /**
     * Creates a new feature entity.
     *
     * @Route("/new", name="features_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $feature = new Feature();
        $form = $this->createForm('AppBundle\Form\FeaturesType', $feature);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($feature);
            $em->flush();

            return $this->redirectToRoute('features_show', array('id' => $feature->getId()));
        }

        return $this->render('@AppBundle/Resources/views/admin/features/new.html.twig', array(
            'feature' => $feature,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a feature entity.
     *
     * @Route("/{id}", name="features_show")
     * @Method("GET")
     */
    public function showAction(Features $feature)
    {
        $deleteForm = $this->createDeleteForm($feature);

        return $this->render('@AppBundle/Resources/views/admin/features/show.html.twig', array(
            'feature' => $feature,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing feature entity.
     *
     * @Route("/{id}/edit", name="features_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Features $feature)
    {
        $deleteForm = $this->createDeleteForm($feature);
        $editForm = $this->createForm('AppBundle\Form\FeaturesType', $feature);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('features_edit', array('id' => $feature->getId()));
        }

        return $this->render('@AppBundle/Resources/views/admin/features/edit.html.twig', array(
            'feature' => $feature,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a feature entity.
     *
     * @Route("/{id}", name="features_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Features $feature)
    {
        $form = $this->createDeleteForm($feature);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($feature);
            $em->flush();
        }

        return $this->redirectToRoute('features_index');
    }

    /**
     * Creates a form to delete a feature entity.
     *
     * @param Features $feature The feature entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Features $feature)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('features_delete', array('id' => $feature->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
