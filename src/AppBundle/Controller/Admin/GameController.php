<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\Game;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Game controller.
 *
 */
class GameController extends Controller
{
    /**
     * Lists all game entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $games = $em->getRepository('AppBundle:Game')->findAll();

        return $this->render('@AppBundle/Resources/views/admin/game/index.html.twig', array(
            'games' => $games,
        ));
    }

    /**
     * Creates a new game entity.
     *
     */
    public function newAction(Request $request)
    {
        $game = new Game();
        $form = $this->createForm('AppBundle\Form\GameType', $game);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($game);
            $em->flush();

            return $this->redirectToRoute('game_show', array('id' => $game->getId()));
        }

        return $this->render('@AppBundle/Resources/views/admin/game/new.html.twig', array(
            'game' => $game,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a game entity.
     *
     */
    public function showAction(Game $game)
    {
        $deleteForm = $this->createDeleteForm($game);

        return $this->render('@AppBundle/Resources/views/admin/game/show.html.twig', array(
            'game' => $game,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing game entity.
     *
     */
    public function editAction(Request $request, Game $game)
    {
        $deleteForm = $this->createDeleteForm($game);
        $editForm = $this->createForm('AppBundle\Form\GameType', $game);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('game_edit', array('id' => $game->getId()));
        }

        return $this->render('@AppBundle/Resources/views/admin/game/edit.html.twig', array(
            'game' => $game,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a game entity.
     *
     */
    public function deleteAction(Request $request, Game $game)
    {
//        $form = $this->createDeleteForm($game);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($game);
            $em->flush();
//        }
            return new Response (null, 204);
//        return $this->redirectToRoute('game_index');
    }

    /**
     * Creates a form to delete a game entity.
     *
     * @param Game $game The game entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Game $game)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('game_delete', array('id' => $game->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
