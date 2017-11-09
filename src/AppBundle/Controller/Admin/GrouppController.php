<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\Groupp;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Groupp controller.
 *
 *
 */
class GrouppController extends Controller
{
    /**
     * Lists all groupp entities.
     *
 
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $groupps = $em->getRepository('AppBundle:Groupp')->findAll();

        return $this->render('@AppBundle/Resources/views/admin/groupp/index.html.twig', array(
            'groupps' => $groupps,
        ));
    }

    /**
     * Creates a new groupp entity.
     *
  
     */
    public function newAction(Request $request)
    {
        $groupp = new Groupp();
        $form = $this->createForm('AppBundle\Form\grouppType', $groupp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($groupp);
            $em->flush();

            return $this->redirectToRoute('groupp_show', array('id' => $groupp->getId()));
        }

        return $this->render('@AppBundle/Resources/views/admin/groupp/new.html.twig', array(
            'groupp' => $groupp,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a groupp entity.
     *

     */
    public function showAction(Groupp $groupp)
    {
        $deleteForm = $this->createDeleteForm($groupp);

        return $this->render('@AppBundle/Resources/views/admin/groupp/show.html.twig', array(
            'groupp' => $groupp,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing groupp entity.
     *
 
     */
    public function editAction(Request $request, Groupp $groupp)
    {
        $deleteForm = $this->createDeleteForm($groupp);
        $editForm = $this->createForm('AppBundle\Form\grouppType', $groupp);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('groupp_edit', array('id' => $groupp->getId()));
        }

        return $this->render('@AppBundle/Resources/views/admin/groupp/edit.html.twig', array(
            'groupp' => $groupp,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a groupp entity.
     *

     */
    public function deleteAction(Request $request, Groupp $groupp)
    {
//        $form = $this->createDeleteForm($groupp);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($groupp);
            $em->flush();
//        }
//
//        return $this->redirectToRoute('groupp_index');
            return new Response (null, 204);
    }

    /**
     * Creates a form to delete a groupp entity.
     *

     */
    private function createDeleteForm(Groupp $groupp)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('groupp_delete', array('id' => $groupp->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
