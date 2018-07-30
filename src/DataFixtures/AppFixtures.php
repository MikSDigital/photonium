<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Camara;
use App\Entity\Control;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i < 10; $i++)
        {
            $entity = new Control();
            
            $entity->setNombre('Control ' . $i);
            $manager->persist($entity);            
        }

        for($i = 1; $i < 10; $i++)
        {
            $entity = new Camara();
            $entity->setNombre('IP ' . $i);
            $manager->persist($entity);
        }
        
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
