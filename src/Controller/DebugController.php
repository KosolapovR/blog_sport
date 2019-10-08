<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Post;
use Doctrine\Common\Persistence\ObjectManager;

class DebugController extends AbstractController
{
    /**
     * @Route("/debug", name="debug")
     */
    public function index(ObjectManager $manager)
    {
        $posts = $manager->getRepository(Post::class)->findAll();
       
         $post = $posts[array_rand($posts)];
         dd($post);
        return $this->render('debug/index.html.twig', [
            'controller_name' => 'DebugController',
        ]);
    }
}
