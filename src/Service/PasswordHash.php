<?php
/**
 * Created by PhpStorm.
 * User: Dimitri
 * Date: 13/11/2018
 * Time: 00:38
 */

namespace App\Service;


use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class PasswordHash
{

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {

        $this->passwordEncoder = $passwordEncoder;
    }

    public function passwordHash(User $user)
    {
        $password = $this->passwordEncoder->encodePassword($user, $user->getPassword());
        return $password;
    }
}