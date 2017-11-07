<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\OurServices;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Ourservice controller.
 *
 */
class OurServicesController extends Controller
{
    /**
     * Lists all ourService entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ourServices = $em->getRepository('AppBundle:OurServices')->findAll();

        return $this->render('@AppBundle/Resources/views/admin/ourservices/index.html.twig', array(
            'ourServices' => $ourServices,
        ));
    }

    /**
     * Creates a new ourService entity.
     *
     */
    public function newAction(Request $request)
    {
        $ourService = new OurServices();
        $form = $this->createForm('AppBundle\Form\OurServicesType', $ourService);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ourService);
            $em->flush();

            return $this->redirectToRoute('ourservices_show', array('id' => $ourService->getId()));
        }

        return $this->render('@AppBundle/Resources/views/admin/ourservices/new.html.twig', array(
            'ourService' => $ourService,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ourService entity.
     *
     */
    public function showAction(OurServices $ourService)
    {
        $deleteForm = $this->createDeleteForm($ourService);

        return $this->render('@AppBundle/Resources/views/admin/ourservices/show.html.twig', array(
            'ourService' => $ourService,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ourService entity.
     *
     */
    public function editAction(Request $request, OurServices $ourService)
    {
        $deleteForm = $this->createDeleteForm($ourService);
        $editForm = $this->createForm('AppBundle\Form\OurServicesType', $ourService);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ourservices_edit', array('id' => $ourService->getId()));
        }

        return $this->render('@AppBundle/Resources/views/admin/ourservices/edit.html.twig', array(
            'ourService' => $ourService,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ourService entity.
     *
     */
    public function deleteAction(Request $request, OurServices $ourService)
    {
//        $form = $this->createDeleteForm($ourService);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ourService);
            $em->flush();
//        }
//
//        return $this->redirectToRoute('ourservices_index');
             return new Response (null, 204);
    }

    /**
     * Creates a form to delete a ourService entity.
     *
     * @param OurServices $ourService The ourService entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(OurServices $ourService)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ourservices_delete', array('id' => $ourService->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
