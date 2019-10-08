<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Cities;
use App\Entity\Tariffs;

class AppFixtures extends Fixture
{
    private $cities_buff = ['Санкт-Петербург', 'Выборг', 'Волхов', 'Тосно', 'Бокситогорск'];
    private $tariffs_buff = ['optimum', 'maxi', 'min'];
    private $faker;
    private $manager;
    public function __construct() {
        $this->faker = \Faker\Factory::create();
    }

    public function load(ObjectManager $manager)
    {
        //$this->loadCities($manager);
        //$this->loadTariffs($manager);
        //$this->loadAddCitiesIntoTariffs($manager);
    }
    private function loadCities(ObjectManager $manager){
        for($i = 0; $i < 5; $i++){
            $city = new Cities();
            $city->setCity($this->faker->unique()->city);
            //$this->setReference('city', $city);
            $manager->persist($city);
        }
        $manager->flush();
    }
    private function loadTariffs(ObjectManager $manager)    {
        for($i = 0; $i < 3; $i++){
            $tariff = new Tariffs();
            
            $tariff->setName($this->tariffs_buff[$i]);
            switch ($i){
                case 0:
                    $tariff->setPrice(450);
                break;
                case 1:
                    $tariff->setPrice(650);
                break;
                case 2:
                    $tariff->setPrice(350);
                break;
            }     
            $tariff->setCreatedAt($this->faker->dateTime);
            //$this->setReference('tariff', $tariff);
           
            $manager->persist($tariff);
         
        }
        $manager->flush();
        
        
    }
    
    public function getOrder(){
        return 1;
    }

//    private function loadAddCitiesIntoTariffs(ObjectManager $manager){
//         //$tariff = $manager->getRepository(Tariffs::class)->findBy(['id' => 9]);
//         //$city = $manager->getRepository(Cities::class)->findBy(['id' => 507]);
//         //dd($tariff[0]);
//        
//    }
}
