<?php

namespace App\DataFixtures;

use App\Entity\Video;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

class VideoFixtures extends AbstractFixture
{
    public function load(ObjectManager $manager)
    {
        $video = new Video();
        $video->setUrl('https://www.youtube.com/embed/SlhGVnFPTDE');
        $this->addReference('video', $video);

        $video1 = new Video();
        $video1->setUrl('https://www.youtube.com/embed/1vtZXU15e38');
        $this->addReference('video1', $video1);

        $video2 = new Video();
        $video2->setUrl('https://www.youtube.com/embed/Sj7CJH9YvAo');
        $this->addReference('video2', $video2);

        $video3 = new Video();
        $video3->setUrl('https://www.youtube.com/embed/kOyCsY4rBH0');
        $this->addReference('video3', $video3);

        $video4 = new Video();
        $video4->setUrl('https://www.youtube.com/embed/cGiAFk2adMw');
        $this->addReference('video4', $video4);

        $video5 = new Video();
        $video5->setUrl('https://www.youtube.com/embed/wDoHk1Y6c-w');
        $this->addReference('video5', $video5);

        $video6 = new Video();
        $video6->setUrl('https://www.youtube.com/embed/SFYYzy0UF-8');
        $this->addReference('video6', $video6);

        $video7 = new Video();
        $video7->setUrl('https://www.youtube.com/embed/L4bIunv8fHM');
        $this->addReference('video7', $video7);

        $video8 = new Video();
        $video8->setUrl('https://www.youtube.com/embed/udwk9nJ0lXA');
        $this->addReference('video8', $video8);

        $video9 = new Video();
        $video9->setUrl('https://www.youtube.com/embed/xhvqu2XBvI0');
        $this->addReference('video9', $video9);

        $manager->flush();
    }
}
