<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends AbstractFixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {

        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('Gégé')
            ->setRoles(array('ROLE_USER'))
            ->setPassword($this->passwordEncoder->encodePassword($user, 'user'))
            ->setAvatar('aa0980543c0b9bcb9707b93fc38ced81.png');

        $user1 = new User();
        $user1->setUsername('Alice')
            ->setRoles(array('ROLE_USER'))
            ->setPassword($this->passwordEncoder->encodePassword($user, 'user'))
            ->setAvatar('56445e6db34733edba018c2a3ea38579.png');

        $user2 = new User();
        $user2->setUsername('Molinari')
            ->setRoles(array('ROLE_USER'))
            ->setPassword($this->passwordEncoder->encodePassword($user, 'user'))
            ->setAvatar('198054a64e57779de33cd0fe756fa752.png');

        $manager->persist($user);
        $manager->persist($user1);
        $manager->persist($user2);

        $manager->flush();

        $this->addReference('user', $user);
        $this->addReference('user1', $user1);
        $this->addReference('user2', $user2);
    }
}
