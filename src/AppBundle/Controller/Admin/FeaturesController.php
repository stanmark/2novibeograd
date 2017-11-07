<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\Features;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Feature controller.
 *
 * 
 */
class FeaturesController extends Controller
{
    /**
     * Lists all feature entities.
     *
     
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
    
     */
    public function newAction(Request $request)
    {
        $feature = new Features();
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
    
     */
    public function deleteAction(Request $request, Features $feature)
    {
       
            $em = $this->getDoctrine()->getManager();
            $em->remove($feature);
            $em->flush();
    

        return new Response (null, 204);
    }

    /**
     * Creates a form to delete a feature entity.
     *
     
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
