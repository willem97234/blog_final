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
use DateTime;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\Date;


class AddPostController extends AbstractController
{
    /**
     * @Route("/postPost", name="postPost")
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function postAction(Request $request,$id)
    {
        // Create a new blank user and process the form
        $post = new Post();
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $post->setTile($form->get('title')->getData());
            $post->setContent($form->get('content')->getData());

            $date = new DateTime();
            $result = $date->format('Y-m-d H:i:s');
            $post->setDate($result);
            $post->setUserid($id);
            // Save
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();

            return $this->redirectToRoute('home');

           /* return $this->redirectToRoute('home', array(
                'id' => $id
            ));*/
        }

        return $this->render('addPost.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/showPost", name="showPost")
     * @param $id
     * @return Response
     */
    public function showPost($id)
    {
        $post = $this->getDoctrine()
            ->getRepository(Post::class)
            ->find($id);

        if (!$post) {
            throw $this->createNotFoundException(
                'No post found for id '.$id
            );
        }

        return new Response('Check out this great product: '.$post->getName());

        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }

    /**
     * @Route("/deletePost", name="deletePost")
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deletePost($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $post = $entityManager->getRepository(Post::class)->find($id);

        if (!$post) {
            throw $this->createNotFoundException( 'No post found for id '.$id);
        }

        $entityManager->remove($post);
        $entityManager->flush();


        return $this->redirectToRoute('home');


        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }

    /**
     * @Route("/updatePost", name="showPost")
     * @param Request $request
     * @param $id
     * @return Response
     * @throws \Exception
     */
    public function updatePost(Request $request,$id)
    {
        $post = $this->getDoctrine()
            ->getRepository(Post::class)
            ->find($id);

        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();


        if (!$post) {
            throw $this->createNotFoundException(
                'No post found for id '.$id
            );
        }

        if ($form->isSubmitted() && $form->isValid()) {

            $post->setTile($form->get('title')->getData());
            $post->setContent($form->get('content')->getData());

            $date = new DateTime();
            $result = $date->format('Y-m-d H:i:s');
            $post->setDate($result);

            // Save
            $em->flush();

            return $this->redirectToRoute('home');

        }
        //return new Response('Check out this great product: '.$post->getName());

        // or render a template
        // in the template, print things with {{ product.name }}
        return $this->render('updatePost.html.twig', [
            'form' => $form->createView(), 'post'=> $post
        ]);
    }

}