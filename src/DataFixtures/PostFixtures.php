<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Post;

class PostFixtures extends Fixture
{
    private $faker;
    public function __construct() {
        $this->faker = \Faker\Factory::create();
    }

    public function load(ObjectManager $manager)
    {
//        for($i = 0; $i < 20; $i++){
//         $post = new Post();
//         $post->setAuthor($this->faker->name);
//         $post->setText($this->faker->realText($maxNbChars = 200, $indexSize = 2));
//         $post->setTitle($this->faker->sentence($nbWords = 3, $variableNbWords = true));
//         $post->setCreatedAt($this->faker->dateTimeThisYear);
//         $manager->persist($post);
//         }
//        $manager->flush();
    }
     public function getOrder() 
     { 
         return 1; 
     }
}
