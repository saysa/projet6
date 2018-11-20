<?php

namespace App\DataFixtures;

use App\Entity\Image;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageFixtures extends AbstractFixture
{
    public function load(ObjectManager $manager)
    {

        $image = new Image();
        $src = __DIR__."/Backflip.jpg";
        $file = new UploadedFile(
            $src,
            'Backflip.jpg',
            'image/jpg',
            filesize($src),
            null,
            true
        );
        $image->setFile($file);

        $image1 = new Image();
        $src1 = __DIR__."/Frontside.jpg";
        $file1 = new UploadedFile(
            $src1,
            'Frontside.jpg',
            'image/jpg',
            filesize($src1),
            null,
            true
        );
        $image1->setFile($file1);

        $image2 = new Image();
        $src2 = __DIR__."/Backside.jpg";
        $file2 = new UploadedFile(
            $src2,
            'Backside.jpg',
            'image/jpg',
            filesize($src2),
            null,
            true
        );
        $image2->setFile($file2);

        $image3 = new Image();
        $src3 = __DIR__."/Ollie.jpg";
        $file3 = new UploadedFile(
            $src3,
            'Ollie.jpg',
            'image/jpg',
            filesize($src3),
            null,
            true
        );
        $image3->setFile($file3);

        $image4 = new Image();
        $src4 = __DIR__."/Frontside540.jpg";
        $file4 = new UploadedFile(
            $src4,
            'Frontside540.jpg',
            'image/jpg',
            filesize($src4),
            null,
            true
        );
        $image4->setFile($file4);

        $image5 = new Image();
        $src5 = __DIR__."/Switchback.jpg";
        $file5 = new UploadedFile(
            $src5,
            'Switchback.jpg',
            'image/jpg',
            filesize($src5),
            null,
            true
        );
        $image5->setFile($file5);

        $image6 = new Image();
        $src6 = __DIR__."/Shred.jpg";
        $file6 = new UploadedFile(
            $src6,
            'Shred.jpg',
            'image/jpg',
            filesize($src6),
            null,
            true
        );
        $image6->setFile($file6);

        $image7 = new Image();
        $src7 = __DIR__."/Grab.jpg";
        $file7 = new UploadedFile(
            $src7,
            'Grab.jpg',
            'image/jpg',
            filesize($src7),
            null,
            true
        );
        $image7->setFile($file7);

        $image8 = new Image();
        $src8 = __DIR__."/Tailbonk.jpg";
        $file8 = new UploadedFile(
            $src8,
            'Tailbonk.jpg',
            'image/jpg',
            filesize($src8),
            null,
            true
        );
        $image8->setFile($file8);

        $image9 = new Image();
        $src9 = __DIR__."/Valeflip.jpg";
        $file9 = new UploadedFile(
            $src9,
            'Valeflip.jpg',
            'image/jpg',
            filesize($src9),
            null,
            true
        );
        $image9->setFile($file9);

        $manager->flush();

        $this->addReference('image', $image);
        $this->addReference('image1', $image1);
        $this->addReference('image2', $image2);
        $this->addReference('image3', $image3);
        $this->addReference('image4', $image4);
        $this->addReference('image5', $image5);
        $this->addReference('image6', $image6);
        $this->addReference('image7', $image7);
        $this->addReference('image8', $image8);
        $this->addReference('image9', $image9);
    }
}
