<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class CommentFixtures extends AbstractFixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $comment = new Comment();
        $comment->setContent('Génial ce trick !')
            ->setTrick($this->getReference('trick'))
            ->setUser($this->getReference('user'));

        $comment1 = new Comment();
        $comment1->setContent('J\'aimerai tant apprendre à le faire !')
            ->setTrick($this->getReference('trick'))
            ->setUser($this->getReference('user1'));

        $comment2 = new Comment();
        $comment2->setContent('Tu es d\'où ? On peut se donner rdv pour que je te donne des astuces.')
            ->setTrick($this->getReference('trick'))
            ->setUser($this->getReference('user2'));

        $comment3 = new Comment();
        $comment3->setContent('Je suis pas loin de Lyon, et toi ?')
            ->setTrick($this->getReference('trick'))
            ->setUser($this->getReference('user1'));

        $comment4 = new Comment();
        $comment4->setContent('Je suis de Grenoble.')
            ->setTrick($this->getReference('trick'))
            ->setUser($this->getReference('user2'));

        $comment5 = new Comment();
        $comment5->setContent('Cool, on pourra se voir super souvent !')
            ->setTrick($this->getReference('trick'))
            ->setUser($this->getReference('user1'));

        $comment6 = new Comment();
        $comment6->setContent('As tu tous les équipements de protection Alice ?')
            ->setTrick($this->getReference('trick'))
            ->setUser($this->getReference('user'));

        $comment7 = new Comment();
        $comment7->setContent('Oui j\'ai un kit complet de 2 ans, et il est super resistant.')
            ->setTrick($this->getReference('trick'))
            ->setUser($this->getReference('user1'));

        $comment8 = new Comment();
        $comment8->setContent('J\'aime ce trick, il est parfait pour débuter, et difficile à maitriser.')
            ->setTrick($this->getReference('trick'))
            ->setUser($this->getReference('user2'));

        $comment9 = new Comment();
        $comment9->setContent('Vous avez des astuces pour que je perde moins de temps à être à l\'aise avec ?')
            ->setTrick($this->getReference('trick'))
            ->setUser($this->getReference('user1'));

        $comment10 = new Comment();
        $comment10->setContent('L\'article est bien détaillé, mais la clé c\'est les appuis.')
            ->setTrick($this->getReference('trick'))
            ->setUser($this->getReference('user'));

        $comment11 = new Comment();
        $comment11->setContent('Oui Gégé a raison, mais attention aux genoux en cas de mauvaise réception, cela peut aller trés loin en termes de blessures.')
            ->setTrick($this->getReference('trick'))
            ->setUser($this->getReference('user2'));


        $manager->persist($comment);
        $manager->persist($comment1);
        $manager->persist($comment2);
        $manager->persist($comment3);
        $manager->persist($comment4);
        $manager->persist($comment5);
        $manager->persist($comment6);
        $manager->persist($comment7);
        $manager->persist($comment8);
        $manager->persist($comment9);
        $manager->persist($comment10);
        $manager->persist($comment11);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            TricksFixtures::class,
            UserFixtures::class
        );
    }
}
