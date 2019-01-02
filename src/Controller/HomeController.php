<?php
/**
 * Created by PhpStorm.
 * User: Will
 * Date: 01/01/2019
 * Time: 14:17
 */

namespace App\Controller;

use App\Entity\Post;
use App\Entity\Comment;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function homeAction(Request $request)
    {

        $posts = $this->getDoctrine()
            ->getRepository(Post::class)
            ->findAll();

        $comments = $this->getDoctrine()
            ->getRepository(Comment::class)
            ->findAll();

        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->find();

        return $this->render('home.html.twig', [
            'posts' => $posts, 'comments' => $comments, 'user' => $user
        ]);


    }
}