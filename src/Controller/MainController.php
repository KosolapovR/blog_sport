<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\Comment;
use App\Entity\User;
use App\Entity\Post;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $posts = $em->getRepository(Post::class)->findAll(); 
        $rand = array_rand($posts);
        $post = $posts[$rand];
        $comments = $em->getRepository(Comment::class)->findByPostId($post->getId());
        //dd($comments);
        
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'post' => $post,
            'comments' => $comments,
        ]);
    }

    /**
     * @Route("/registration", name="registration")
     */
    public function registration(Request $request, UserPasswordEncoderInterface $encoder)
    {
        
        $user = new User();
        $form = $this->createForm(\App\Form\RegistrationType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
           $em = $this->getDoctrine()->getManager();
           $user->setCreatedAt(new \DateTime());
           $user->setRoles(['ROLE_USER']);
           $user->setPassword($encoder->encodePassword($user, $user->getPassword()));
           $em->persist($user);
           $em->flush();
           return $this->redirectToRoute('main');
        }
        
        
        return $this->render('registration/registration.html.twig', [
            'controller_name' => 'MainController',
            'form' => $form->createView()
        ]);
    }
}
