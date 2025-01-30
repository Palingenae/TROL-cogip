<?php

namespace App\DataFixtures;

use App\Entity\Type;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TypeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $dateImmutable = new DateTime("now");
        // $product = new Product();
        // $manager->persist($product);
        for ($i=0; $i < 10 ; $i++) { 
            $type = new Type();
            $type->setName('type'.$i);
            $type->setCreatedAt($dateImmutable);
            $type->setUpdatedAt($dateImmutable);
            $manager->persist($type);

        }
        $manager->flush();
    }
}