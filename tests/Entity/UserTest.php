<?php

namespace App\Tests\Entity;


use App\Entity\User;
use PHPUnit\Framework\TestCase;

class php extends TestCase
{
    private $user;

    public function setUp()
    {
        $this->user = new User();
    }

    public function testTrickIsInstanceOfTrickClass()
    {
        $this->assertInstanceOf(User::class, $this->user);
    }

    public function testUsernameIsNotNull()
    {
        $this->user->setUsername('TestUsername');
        $this->assertNotNull($this->user->getUsername());
    }

    public function testRoleIsNotNull()
    {
        $this->user->setRoles(array('ROLE_USER'));
        $this->assertNotNull($this->user->getRoles());
    }

    public function testPasswordIsNotNull()
    {
        $this->user->setPAssword('Azerty%123');
        $this->assertNotNull($this->user->getPAssword());
    }
}
