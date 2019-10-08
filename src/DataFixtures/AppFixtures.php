<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\Post;
use App\Entity\User;
use App\Entity\Comment;

class AppFixtures extends Fixture
{
    private $faker;
    private $encoder;
    
    public function __construct(UserPasswordEncoderInterface $encoder) {
        $this->encoder = $encoder;
        $this->faker = \Faker\Factory::create();
    }
    public function load(ObjectManager $manager)
    {
        $this->loadUser($manager);
        $this->loadPost($manager);
        $this->loadComment($manager);
    }
    private function loadUser(ObjectManager $manager){
        $users = $manager->getRepository(User::class)->findAll();
        if(count($users) < 19){
            for($i = 0; $i < 20; $i++){
                $user = new User();
                $user->setEmail($this->faker->email);
                $user->setName($this->faker->firstName);
                $user->setSurname($this->faker->lastName);
                $user->setPassword($this->encoder->encodePassword($user, $this->faker->password));
                $user->setRoles(['ROLE_USER']);
                $user->setVerified(false);
                $user->setCreatedAt($this->faker->dateTimeThisYear);
                $manager->persist($user);
            }
            $manager->flush();
        }
    }
    private function loadPost(ObjectManager $manager){
        $posts = $manager->getRepository(Post::class)->findAll();
        $authors = $manager->getRepository(User::class)->findAll();
        if(count($posts) < 19){
            for($i = 0; $i < 20; $i++){
                $post = new Post();
                $post->setAuthor(($authors[array_rand($authors)])->getName());
                $post->setText($this->faker->realText($maxNbChars = 200, $indexSize = 2));
                $post->setTitle($this->faker->sentence($nbWords = 3, $variableNbWords = true));
                $post->setCreatedAt($this->faker->dateTimeThisYear);
                $manager->persist($post);
            }
            $manager->flush();
        }
    }
    private function loadComment(ObjectManager $manager){
        $authors = $manager->getRepository(User::class)->findAll();
        $comments = $manager->getRepository(Comment::class)->findAll();
        if(count($comments) < 19){
            for($i = 0; $i < 20; $i++){
                $posts = $manager->getRepository(Post::class)->findAll();
                $post = $posts[array_rand($posts)];
                $comment = new Comment();
                $comment->setAuthor(($authors[array_rand($authors)])->getName());
                $comment->setCreatedAt($this->faker->dateTimeThisYear);
                $comment->setText($this->faker->realText($maxNbChars = 20, $indexSize = 2));
                $comment->setPost($post);
                $manager->persist($comment);
             }
             $manager->flush();
        }
    }
}
