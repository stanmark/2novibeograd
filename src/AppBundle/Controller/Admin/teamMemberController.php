<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\teamMember;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Teammember controller.
 *
 */
class teamMemberController extends Controller
{
    /**
     * Lists all teamMember entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $teamMembers = $em->getRepository('AppBundle:teamMember')->findAll();
        

        return $this->render('@AppBundle/Resources/views/admin/teammember/index.html.twig', array(
            'teamMembers' => $teamMembers,
            
        ));
    }

    /**
     * Creates a new teamMember entity.
     *
     */
    public function newAction(Request $request)
    {
        $teamMember = new Teammember();
        $form = $this->createForm('AppBundle\Form\teamMemberType', $teamMember);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($teamMember);
            $em->flush();

            return $this->redirectToRoute('teammember_show', array('slug' => $teamMember->getSlug()));
        }

        return $this->render('@AppBundle/Resources/views/admin/teammember/new.html.twig', array(
            'teamMember' => $teamMember,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a teamMember entity.
     *
     */
    public function showAction(teamMember $teamMember)
    {
        $deleteForm = $this->createDeleteForm($teamMember);

        return $this->render('@AppBundle/Resources/views/admin/teammember/show.html.twig', array(
            'teamMember' => $teamMember,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing teamMember entity.
     *
     */
    public function editAction(Request $request, teamMember $teamMember)
    {
        $deleteForm = $this->createDeleteForm($teamMember);
        $editForm = $this->createForm('AppBundle\Form\teamMemberType', $teamMember);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('teammember_edit', array('slug' => $teamMember->getslug()));
        }

        return $this->render('@AppBundle/Resources/views/admin/teammember/edit.html.twig', array(
            'teamMember' => $teamMember,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a teamMember entity.
     *
     */
    public function deleteAction(Request $request, teamMember $teamMember)
    {
//        $form = $this->createDeleteForm($teamMember);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($teamMember);
            $em->flush();
//        }
//
//        return $this->redirectToRoute('teammember_index');
            return new Response (null, 204);
    }

    /**
     * Creates a form to delete a teamMember entity.
     *
     * @param teamMember $teamMember The teamMember entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(teamMember $teamMember)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('teammember_delete', array('slug' => $teamMember->getslug())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
