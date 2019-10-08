<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;

class UserFixtures extends Fixture
{
    private $faker;
    private $encoder;
    public function __construct(UserPasswordEncoderInterface $encoder) {
        $this->encoder = $encoder;
        $this->faker = \Faker\Factory::create();
       
    }
    public function load(ObjectManager $manager)
    {
        
//        for($i = 0; $i < 20; $i++){
//            $user = new User();
//            $user->setEmail($this->faker->email);
//            $user->setName($this->faker->firstName);
//            $user->setSurname($this->faker->lastName);
//            $user->setPassword($this->encoder->encodePassword($user, $this->faker->password));
//            $user->setRoles(['ROLE_USER']);
//            $user->setVerified(false);
//            $user->setCreatedAt($this->faker->dateTimeThisYear);
//            $manager->persist($user);
//        }
//        $manager->flush();
    }
}
