<?php
/**
 * Created by PhpStorm.
 * User: Will
 * Date: 01/01/2019
 * Time: 14:25
 */

namespace App\Controller;

use App\Entity\Comment;
use App\Form\CommentType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class AddCommentController extends AbstractController
{
    /**
     * @Route("/postComment", name="postComemnt")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function commentAction(Request $request)
    {
        // Create a new blank user and process the form
        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $comment->setUsername($form->get('username')->getData());
            $comment->setContent($form->get('content')->getData());

            // Save
            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('addComment.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}