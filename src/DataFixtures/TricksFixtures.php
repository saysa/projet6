<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Comment;
use App\Entity\Image;
use App\Entity\Trick;
use App\Entity\User;
use App\Entity\Video;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class TricksFixtures extends Fixture
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
        /***********
         *
         * USERS
         *
         **********/

        $user = new User();
        $user->setUsername('Gégé')
            ->setRoles(array('ROLE_USER'))
            ->setPassword($this->passwordEncoder->encodePassword($user, 'admin'))
            ->setAvatar('aa0980543c0b9bcb9707b93fc38ced81.png');

        $manager->persist($user);

        /***************
         *
         * CATEGORIES
         *
         **************/


        $category = new Category();
        $category->setName('Grab');
        $manager->persist($category);

        $category1 = new Category();
        $category1->setName('Rotation');
        $manager->persist($category1);

        $category2 = new Category();
        $category2->setName('Flip');
        $manager->persist($category2);

        $category3 = new Category();
        $category3->setName('Slide');
        $manager->persist($category3);


        /*************
         *
         * VIDEOS
         *
         *************/

        $video = new Video();
        $video->setUrl('https://www.youtube.com/embed/SlhGVnFPTDE');

        /************
         *
         *IMAGES
         *
         ************/

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


        /*************
         *
         * TRICKS
         *
         *************/

        $trick = new Trick();
        $trick->setName('Backflip')
            ->setContent('Le fameux Backflip, un trick très fun et facile à maitriser que l’on peut placer à beaucoup d’endroits. 
On peut aussi l’appeler rodéo back 3.6 si on le tourne un peu sur le côté, mais c’est le même mouvement.
Le mieux c’est de s’entrainer à le faire sur un trampoline car le mouvement est le même.
Choisissez un kicker de bord de piste, qui kicke un peu de préférence, pour vous aider à envoyer facilement
Arrivez bien fléchi en appui sur les 2 jambes et fixez le bout du kicker.

L’impulsion se fait à 2 pieds au bout du kicker et pas avant : si on envoie trop tôt on risque de taper la tête
dans le kicker ou de trop tourner, de faire un tour et demi et de tomber sur la tête. Deux situations à éviter...
Donc impulsion à deux pieds, et on envoie la tête en arrière pour chercher le mouvement.
Dès que l’on a décollé il faut remonter les genoux pour enrouler le mouvement.
Les profs de gym ont tendance à dire que l’on envoie le mouvement avec le bassin, ce qui n’est pas faux
mais c’est surtout quand on a compris le mouvement et que l’on est à l’aise avec.

Donc regrouper les jambes en les montant. A ce moment on peut aussi penser à grabber
mais ce n’est pas obligé pour commencer... On continue d’emmener la rotation avec la tête en arrière.
Très vite on peut voir la réception et on va pouvoir gérer la fin de al rotation soit en se tendant
un peu pour la ralentir, soit en se regroupant encore davantage pour tourner plus vite.
Replacez bien la board sous votre corps avant d’atterrir, et amortir en pliant les jambes
Amusez vous bien avec ce tricks, et attention : plus le kicker est gros plus il faut envoyer le mouvement doucement...')
            ->setImage($image)
            ->setCategory($category2)
            ->setVideo($video);

        $manager->persist($trick);

        /**************
         *
         * COMMENTS
         *
         **************/


        $comment = new Comment();
        $comment->setContent('Génial ce trick !')
            ->setTrick($trick)
            ->setUser($user);

        $manager->persist($comment);

        $manager->flush();
    }
}
