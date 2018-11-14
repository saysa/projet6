<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $category = new Category();
        $category->setName('Ski Alpin');
        $manager->persist($category);

        $category1 = new Category();
        $category1->setName('SnowBoard');
        $manager->persist($category1);

        $manager->flush();

    }
}
