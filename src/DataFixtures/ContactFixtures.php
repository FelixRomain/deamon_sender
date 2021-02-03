<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Contact;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ContactFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
       $faker = Factory::create('FR-fr');

       for($i = 1;$i <=1000; $i++) {
           $contact = new Contact();

           $lastname = $faker->lastName();
           $firstname = $faker->firstname();
           $number = $faker->phoneNumber();

           $contact->setLastname($lastname)
                    ->setFirstname($firstname)
                    ->setNumber($number);

            $manager->persist($contact);
       }

        $manager->flush();
    }
}
