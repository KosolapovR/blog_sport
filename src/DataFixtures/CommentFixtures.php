<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Comment;
use App\Entity\Post;


class CommentFixtures extends Fixture
{
    private $faker;
    private $posts;
    private $comments;
    public function __construct(ObjectManager $manager) {
        $this->faker = \Faker\Factory::create();
        $this->posts = $manager->getRepository(Post::class)->findAll();
       // $this->comments = $manager->getRepository(Comment::class)->findAll();
    }
    public function load(ObjectManager $manager)
    {    
         
         
//         $post = $this->posts[array_rand($this->posts)];
//         //$comment = $this->comments[array_rand($this->comments)];
//         $comment = new Comment();
//         $comment->setAuthor($this->faker->name);
//         $comment->setCreatedAt($this->faker->dateTimeThisYear);
//         $comment->setText($this->faker->realText($maxNbChars = 20, $indexSize = 2));
//         $comment->setPost($post);
//         $manager->persist($comment);
//         $manager->flush();

         
         
    }
    public function getOrder() 
     { 
         return 2; 
     }
}
