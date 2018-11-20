<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

class CommentFixtures extends AbstractFixture
{

    public function load(ObjectManager $manager)
    {
        $category = new Category();
        $category->setName('Grab');
        $this->addReference('Grab0', $category);
        $manager->persist($category);

        $category1 = new Category();
        $category1->setName('Rotation');
        $this->addReference('Rotation1', $category1);
        $manager->persist($category1);

        $category2 = new Category();
        $category2->setName('Flip');
        $this->addReference('Flip2', $category2);
        $manager->persist($category2);

        $category3 = new Category();
        $category3->setName('Slide');
        $this->addReference('Slide3', $category3);
        $manager->persist($category3);

        $category4 = new Category();
        $category4->setName('Switch');
        $this->addReference('Switch4', $category4);
        $manager->persist($category4);

        $manager->flush();
    }
}
