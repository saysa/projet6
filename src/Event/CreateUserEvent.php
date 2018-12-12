<?php

namespace App\Event;

use App\Entity\User;
use Symfony\Component\EventDispatcher\Event;

class CreateUserEvent extends Event
{
    const NAME = 'user.register';

    /**
     * @var User
     */
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }
}