<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Cities;
use App\Entity\Tariffs;

class CityToTariff extends Fixture
{
    public function load(ObjectManager $manager)
    {
//        for($i = 0; $i < 10; $i++){
//            $all_tariff = $manager->getRepository(Tariffs::class)->findAll();
//            $tariff = $all_tariff[array_rand($all_tariff)];
//            $all_city = $manager->getRepository(Cities::class)->findAll();
//            $city = $all_city[array_rand($all_city)];
//            $city->addTariff($tariff);
//            $manager->persist($city);    
//        }
//        $manager->flush();
    }
    public function getOrder(){
        return 2;
    }
}
