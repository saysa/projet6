<?php

namespace App\Tests\Entity;


use App\Entity\Trick;
use PHPUnit\Framework\TestCase;

class TrickTest extends TestCase
{
    private $trick;

    public function setUp()
    {
        $this->trick = new Trick();
    }

    public function testTrickIsInstanceOfTrickClass()
    {
        $this->assertInstanceOf(Trick::class, $this->trick);
    }

    public function testNameIsNotNull()
    {
        $this->trick->setName('Testname');
        $this->assertNotNull($this->trick->getName());
    }

    public function testSlugIsNotNull()
    {
        $this->trick->setSlug('test-slug');
        $this->assertNotNull($this->trick->getSlug());
    }

    public function testDescriptionIsNotNull()
    {
        $this->trick->setcontent('Test contenu pour le trick');
        $this->assertNotNull($this->trick->getContent());
    }

    public function testCreatedAt()
    {
        $this->trick->setCreatedAt(new \DateTime());
        $this->assertInstanceOf(\DateTime::class, $this->trick->getCreatedAt());
    }
}
