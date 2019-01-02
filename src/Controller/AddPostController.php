<?php
/**
 * Created by PhpStorm.
 * User: Will
 * Date: 01/01/2019
 * Time: 14:18
 */

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class AddPostController extends AbstractController
{
    /**
     * @Route("/postPost", name="postPost")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function postAction(Request $request)
    {
        // Create a new blank user and process the form
        $post = new Post();
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $post->setTile($form->get('title')->getData());
            $post->setContent($form->get('content')->getData());

            // Save
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('addPost.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}