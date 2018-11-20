<?php

namespace App\DataFixtures;

use App\Entity\Trick;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class TricksFixtures extends AbstractFixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
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
            ->setImage($this->getReference('image'))
            ->setCategory($this->getReference('Flip2'))
            ->setVideo($this->getReference('video'));

        $trick1 = new Trick();
        $trick1->setName('Frontside 720')
            ->setContent('Lorsque l’on pense essayer ce tricks, c’est que l’on maitrise déjà très bien le 3.6 et le 5.4 front,
n\'hésitez pas à aller réviser ces classiques dans les tutos précédents.
Le Frontside 7, comment ça marche :
La phase d’approche consiste à arriver bien fléchi sur le kicker, la planche bien à plat, les épaules dans l’axe de la board,
le regard fixé sur le bout du kicker.

L\'impulsion se fait à 2 pieds au bout du kicker. Ne pas pousser trop fort aux premiers essais au risque d’être déséquilibré.
Donc impulsion à 2 pieds, en lançant la rotation avec les épaules comme un 5.4 front (voir le tuto) mais il faut les lancer plus vite et donc plus fort, 
à affiner selon la taille du saut. Pour un Frontside 720, on peut avoir une impulsion bien à plat,  en appui léger sur les talons ou encore en appuie pointe de pieds, 
suivant le style qu\'on veut donner à son tricks et surtout suivant comme on se sent le plus à l’aise de faire. Mais surtout il ne faut déraper le moins possible sur le kicker pour ne pas perdre d’élan, en particulier sur une table de park.

Pour que la rotation se fasse bien à plat il faut lancer le mouvement avec  les épaules à l’horizontale et la tête qui va vers l’épaule avant.
Pour désaxer, c’est la tête qui va chercher à twister le mouvement et les épaules ne seront plus à l’horizontale.
Dès que l’on est en l’air il faut se regrouper et grabber. Pour commencer je conseille le Melon (voir tuto sur les grabs). 
Une fois que l’on maitrise bien le mouvement on peut changer de grab. Dans tous les cas, la main de libre va chercher 
à emmener la rotation et aider à contrôler la vitesse à laquelle on tourne.

Il faut aller chercher la réception du regard par dessus l’épaule avant : on l’aperçoit après 3/4 de tour 
puis très bien après le premier 360. À ce moment là, ne pas la fixer et continuer de regarder vers l\'épaule pour continuer
à emmener la rotation. Enrouler bien le mouvement pour continuer à tourner toujours en allant chercher du regard et
en s’aidant de la main qui ne grave  pas. À partir de maintenant tout va ce passer comme pour la fin d’un 3.6 front.

Quand on voit la réception arriver entre les pieds, il faut amener la board dans l’axe de la réception et détendre 
les jambes pour chercher à atterrir la planche la plus à plat possible

On amortit bien en regardant ses pieds pour être sûr que la rotation s’arrête. 
Le défaut le plus commun est de regarder devant au moment ou on atterrit. 
Du coup, sans en avoir conscience, les  épaules ont fait quelques degrés de plus car elles continuent à tourner emportées par le mouvement, 
ce qui déséquilibre la réception, et souvent on tombe sur le cul. Donc réception en appuie sur les deux pieds, 
en regardant ses pieds, on ne relève la tête qu’une fois que l’on a bien amorti.')
            ->setImage($this->getReference('image1'))
            ->setCategory($this->getReference('Flip2'))
            ->setVideo($this->getReference('video1'));

        $trick2 = new Trick();
        $trick2->setName('backside 180')
            ->setContent('Pour les néophytes, le backside 180 ou 180 back est un saut avec un demi tour qui s\'effectue
côté pointes de pieds en envoyant les épaules dos à la pente lors de la rotation, ce qui fait qu\'à l’atterrissage 
on se retrouve en marche arrière. Comme dans toute rotation l’important est la synchronisation entre l’impulsion et la rotation des épaules.

Le Backside 180 peut s’expliquer en plusieurs phases :
La phase d’approche consiste à avoir sa planche la plus à plat possible ou légèrement sur la carre frontside ; 
le regard est pointé vers le spot (l’endroit où on veut décoller). Les jambes sont fléchies, prêtes à donner une impulsion.

L’impulsion : on a le choix entre un ollie façon skate (comme on peut le voir dans notre tuto sur le Ollie) et une impulsion 
franche à deux pieds. L’impulsion à deux pieds conviendra mieux sur un kicker de park alors qu’un ollie plus skate et un peu sur la carre 
est plus évident en bord de piste. Donc on envoie une impulsion  en enclenchant très doucement les épaules de 30°.

Engager la rotation à l’aveugle, de dos… pas de panique, l’astuce est de regarder votre pied arrière pour voir défiler le sol 
en dessous et permettre au corps de faire un 180° progressif. Attendez de voir la réception pour ajuster la board  tout en gardant 
les épaules dans l’axe de la planche ou légèrement en retard pour bien arrêter la rotation.

En réception : bien amortir sur les jambes, continuer de regarder entre les pieds pour garder l’équilibre. Ce n’est qu’une 
fois que l\'on a bien amorti qu\'on pourra relever la tête et regarder ou l\'on va…
Avant d’essayer un 180 back, le mieux est d\'essayer de bien rider en switch pour que ce ne soit pas trop la panique à 
l’atterrissage et de bien repérer le terrain et les autres rideurs pour ne pas provoquer de collisions. 
À vous de jouer ! Comme d’habitude, allez y progressivement, amusez vous  et prenez beaucoup de plaisir pour faire des backside 180, 
qui est à notre avis un de plus beaux tricks du snowboard…
')
            ->setImage($this->getReference('image2'))
            ->setCategory($this->getReference('Slide3'))
            ->setVideo($this->getReference('video2'));

        $trick3 = new Trick();
        $trick3->setName('un ollie en snowboard')
            ->setContent('Le Ollie est une impulsion  avec déformation de la planche qui permet de faire un saut, 
comme un ollie de skate, mais en beaucoup plus facile car les deux pieds sont attachés sur la board.

Conseils pour réaliser à un ollie en snowboard.
Le Ollie peut se décomposer en plusieurs phases :

La phase d’approche consiste à avoir sa planche la plus à plat possible ou légèrement sur la carre; le regard pointé vers 
le spot (l’endroit où on veut décoller). Les jambes sont fléchies, prêtes à donner une impulsion.

Pour déclencher le Ollie, il faut tirer sur la jambe avant tout en appuyant sur la jambe arrière pour déformer la planche 
et aller chercher le pop de son snowboard (le «rebond» de la planche). On peut s\'aider des bras en les dépliants comme un 
oiseau qui cherche à s\'envoler ;)

Dés que l’on sent qu’on décolle, il faut regrouper les jambes et les bras pour gagner en stabilité, le regard cherche déjà 
l’endroit où on va aller atterrir tout en essayant de profiter du moment présent…

Pour atterrir, il faut légèrement détendre les jambes pour aller chercher le sol tout en préparant l’amorti, c’est à 
dire forcer sur les jambes qui servent d’amortisseur. Bien plier les genoux sans se laisser assoir par la force de gravité.

Le mieux c’est de commencer à s’entrainer à faire des ollies à plat sur la piste, puis en profitant des petits reliefs 
de bord de piste. Quand on se sent vraiment  à l’aise, on peut commencer à essayer sur de plus gros sauts 
(kickers de snowpark par exemple). Ne pas hésiter à être créatif, repérer toute variation de terrain qui peut être un 
bon spot pour envoyer un ollie, et transformer la montagne en terrain de jeu…')
            ->setImage($this->getReference('image3'))
            ->setCategory($this->getReference('Grab0'))
            ->setVideo($this->getReference('video3'));

        $trick4 = new Trick();
        $trick4->setName('Frontside 540')
            ->setContent('Dans notre cas, ça se passe dans le sens frontside comme son nom l’indique, c’est à dire 
            à droite pour les regular et à droite pour les goofies. On peut également l’exécuter en switch, c’est une Cab 5.4, 
            les regulars tourneront alors à Droite et les goofies à gauche.

Le front 5.4, comment ça marche :

Avant tout, il faut bien maitriser le 3.6 front pour apprendre le 5.4. Et comme d’habitude quand vous allez faire du park, pour savoir la vitesse qu’il faut prendre pour sauter une table, attendez de voir quelqu’un sauter...

La phase d’approche consiste à arriver bien fléchi sur le kicker, la planche bien à plat, les épaules dans l’axe de la board, le regard bien fixé sur le bout du kicker.

L’impulsion se fait à 2 pieds au bout du kicker. Ne pas pousser trop fort aux premiers essais au risque d’être déséquilibré. Donc impulsion à 2 pieds en lançant la rotation avec les épaules comme un 3.6 front mais il faut les lancer plus vite et donc plus fort. La vitesse à laquelle il faut lancer les épaule pour lancer la rotation dépend de la taille du saut évidement... Au début il faut commencer par des petits sauts de bord de piste en lançant fort les épaules. 
Pour un 5.4 front on peut avoir une impulsion bien à plat, en appui léger sur les talons ou en appui pointe de pied suivant le style qu\'on veut donner à son tricks et surtout suivant comme on se sent à l’aise. Mais surtout il faut déraper le moins possible sur le kicker pour ne pas perdre d’élan, en particulier sur une table de park.

Pour que la rotation se fasse à plat, il faut lancer le mouvement avec  les épaules à l’horizontale. La tête va vers l’épaule avant. 
Pour désaxer c’est la tête qui va chercher à twister le mouvement, et les épaules ne seront plus à l’horizontale.

Dès que l’on est en l’air, se regrouper et grabber. La main de libre va chercher à emmener la rotation et aider à contrôler la vitesse à laquelle on tourne.

Il faut aller chercher la rotation du regard par dessus l’épaule avant, on l’aperçoit après 3/4 de tour puis très bien après le premier 360. À ce moment là il faut fixer des yeux la réception et ne pas la lâcher. Le mouvement est fini avec la tête tandis qu’il continue avec les épaules et le bas du corps restés en retard pour aller s’aligner vers la réception.

Pour atterrir, il faut ramener le bas du corps dans l’axe de la réception en se regroupant si on a besoin d’accélérer le mouvement. On détend ses jambes pour aller chercher la réception puis amortir sur les deux jambes au contact du sol. Les épaules doivent être dans l’axe de la board ou légèrement en retard pour arrêter la rotation, surtout si on sent que l’on tournait trop vite, ça évite la sur-rotation. Regardez devant vous.')
            ->setImage($this->getReference('image4'))
            ->setCategory($this->getReference('Flip2'))
            ->setVideo($this->getReference('video4'));

        $trick5 = new Trick();
        $trick5->setName('switch back 540')
            ->setContent('Alors, comment ça marche le Switch BS 540 ? La méthode en vidéo ci-dessous, commentée avec 
des mots qui forment des phrases juste après.



Avant tout, il faut bien maitriser le fait de rider en switch avec aisance ainsi que le switch 180 back pour l’arrivé sur le kick et les 360 front pour la fin de la rotation et le replaquage. 

La phase d’approche consiste à arriver bien fléchi sur le kicker, la planche bien à plat, les épaules dans l’axe de la board, le regard fixé sur le bout du kicker.

L’impulsion se fait à 2 pieds au bout du kicker, en lançant la rotation avec les épaules. Ne pas pousser trop fort aux premiers essais au risque d’être déséquilibré. La vitesse à laquelle il faut lancer les épaules pour lancer la rotation dépend de la taille du saut évidement… Le mieux est de commencer par un saut d’environ 5m, sa suffit pour tourner ce tricks.

Pour que la rotation se fasse à plat, il faut lancer le mouvement avec  les épaules à l’horizontale. Le regard se porte par dessus l’épaule, le menton au niveau de l’épaule. Pour désaxer, c’est la tête qui va chercher à twister le mouvement, et les épaules ne seront plus à l’horizontale.

Dès que l’on est en l’air, se regrouper et grabber. On vous conseille le Melon Grab pour commencer, c’est le plus simple avec cette rotation.

Il faut aller chercher la rotation du regard par dessus l’épaule avant. On aperçoit la reception après 270° et a partir de ce moment là c’est tout comme la fin d\'un bon vieux 360 front. Il faut donc fixer des yeux la réception et ne pas la lâcher. Le mouvement est fini avec la tête tandis qu’il continue avec les épaules et le bas du corps restés en retard pour aller s’aligner vers la réception.

Pour atterrir, il faut ramener le bas du corps dans l’axe de la réception en se regroupant si on a besoin d’accélérer le mouvement. On détend ses jambes pour aller chercher la réception puis amortir sur les deux jambes au contact du sol. Les épaules doivent être dans l’axe de la board ou légèrement en retard pour arrêter la rotation, surtout si on sent que l’on tournait trop vite, ça évite la sur-rotation. Regardez devant vous une fois que vous avez fini d’amortir.')
            ->setImage($this->getReference('image5'))
            ->setCategory($this->getReference('Switch4'))
            ->setVideo($this->getReference('video5'));

        $trick6 = new Trick();
        $trick6->setName('shred en snowboard')
            ->setContent('Les tricks peuvent être de simples ollies, un shifty, un grab, une rotation, un press, 
tout ce qui est flat, et même des rails, bref tout est permis, le but c’est de s’amuser, et n’oublions pas la base, le carving…

Ce qui est bien c’est qu’avec le shred,  c\'est qu\'on n\'a pas besoin de prendre trop de vitesse pour exécuter un trick et s’amuser, ça rend toujours une piste banale beaucoup plus fun sans prendre trop de risques.

Pour commencer et vraiment progresser en shred,  le mieux est de rider une petite board bien souple qui va se plier facilement et va permettre  d’apprendre et de progresser sur des tricks plus facilement avec plus de tolérance, spécialement avec les boards qui sont bien souples en torsion. Si on est à l’aise et que l’on sait bien plier sa board, on peut aussi faire tout ça avec une board plus ferme et performante, ça sera toujours plus polyvalent...

Pour commencer il faut apprendre à marcher avec sa board, de face en rebondissant d’une spatule sur l’autre. Ça entraine à bien manier sa board, à être plus à l’aise dessus et à mieux la contrôler. Il faut aussi apprendre à bien rider en switch (marche arrière), c’est toujours bien de savoir rider dans les deux sens quand on veut faire du freestyle, et encore plus pour shredder.

Le premier tricks de shred que l’on conseille c’est le 180 front. Il suffit de faire un ollie en ouvrant les épaules de face, puis une fois en l’air faire pivoter le bas du corp pour le mettre dans l’axe de la réception et ainsi replaquer en switch. On peut faire ce 180 front sur beaucoup de spots tout comme les autres tricks que l’on a appris dans les tutos précédents : Ollie, 180 back et switch 180 back, 3.6 back, 3.6 front et les cab 3.6.

Les press sont les appuis sur les spatules, on peut les faire dans l’axe ou en travers, ce sont de bons tricks pour apprendre à bien maitriser sa board et une bonne base pour les tricks de Flat.

Les tricks de Flat justement, on conseille de vraiment apprendre où est le point de flexion en press de ses spatules avant de se lancer. Une fois que l’on  maitrise bien ce press, on peut essayer de faire un 180 et de d’atterrir en press, puis de sortir de ce press en poppant (appuyer sur la spatule pour avoir un rebond et décoller comme en ollie) et ainsi faire un autre 180, ou un 360...

On verra en détails certains tricks dans des prochain tutos, dans celui-ci le but est vraiment d’apprendre à combiner ce qu’on à appris dans les tutos précédent en y rajoutant quelques notions de press, de carving et de lecture de terrain.

N’oublions pas que le snowboard c’est juste pour le fun, il ne faut pas hésiter à aller s\'amuser en shreddant ou bon nous semble, sur les pistes autant que dans un jardin ou en ville, tant qu’il y a un bout de neige et de la motivation, ça sera une bonne session.
')
            ->setImage($this->getReference('image6'))
            ->setCategory($this->getReference('Slide3'))
            ->setVideo($this->getReference('video6'));

        $trick7 = new Trick();
        $trick7->setName('grabs en snowboard')
            ->setContent('Le grab, comment ça marche?
Il faut d\'abord faire un saut, un simple ollie par exemple comme on peut le voir sur le tuto du ollie. Bien plier les jambes une fois en l’air pour se regrouper, et aller chercher la planche avec la main. Attention il ne faut pas que le buste se casse en deux pour aller chercher la board : ce sont bien les genoux qui remontent pour amener la board vers la main.

Les 6 grabs de base :

Indy : la main arrière vient graber la carre frontside entre les pieds. Sur un saut droit c’est un Indy Grab, sur un hip ou un quarter en front c’est un frontside indy ou frontside grab alors que sur un saut en back (3.6 back par exemple) ça sera un backside Indy.

Mute : la main avant grabbe la carre frontside entre les pieds.

3Nose grab : la main avant grabbe le nose (la spatule avant).

Melon (aussi appelé sad en skate) : la main avant grabbe la carre bakside entre les talons. En désaxant le corps et la board cela peut faire un Method ou un Backside Air.

Stalefish : la main arrière grabbe la carre backside entre les talons.

Tail grab : La main arrière grabbe le tail (la spatule arrière).

Attention aux zones dites de grabs interdits qui se trouvent entre les spatules et les fixations, il faut avoir beaucoup de style pour s’y risquer et que ça soit joli, un peu comme Shaun White avec ses grabs de boots et de fixations...')
            ->setImage($this->getReference('image7'))
            ->setCategory($this->getReference('Grab0'))
            ->setVideo($this->getReference('video7'));

        $trick8 = new Trick();
        $trick8->setName('Tail bonk reverseback 3')
            ->setContent('L’idéal dans ce genre de tricks est d’avoir un spot avec un peu de distance entre le kick et l’objet (poubelle, poteau, muret, jalon...) que tu veux « bonker ».

Ensuite il faut arriver le plus à plat possible, genoux fléchis, en visualisant bien l’endroit où tu vas venir taper ta deck afin d’avoir le bon axe en sortie de kick. On déclenche le ollie en pompant au mieux dans le kicker afin de profiter de la relance de la planche (photo 1). 

La clé de ce trick, c’est d’arriver à lancer une rotation backside tout en restant durant un laps de temps dans une démarche de shity front. C’est-à-dire que les épaules vont partir dans un sens alors que les jambes vont, elles, entamer une démarche de rotation opposée (photo 2). 

Le moment crucial du bonk arrive et c’est grâce à lui que le corps va complètement partir dans la direction des épaules et relancer les jambes dans l’autre sens (photos 3 et 4). 

Le regard va ensuite venir chercher le landing, on contracte les abdos et le reste du corps suivra (reste de la séquence).

Une petite variante en faisant d’abord un simple 180 en sortie permettra de se familiariser avec le trick avant d’y aller plus franchement pour le 360.

Et n’oublie pas, internaute anxieux, « persévérance est mère de récompense ».
')
            ->setImage($this->getReference('image8'))
            ->setCategory($this->getReference('Rotation1'))
            ->setVideo($this->getReference('video8'));

        $trick9 = new Trick();
        $trick9->setName('Vale flip')
            ->setContent('Pour expliquer un peu ce trick, il faudrait déjà lui donner un nom ! C’est un mélange entre un fs 5 underflip et un rodéo 5. 
En tout cas, c’est clairement un trick inspiré du pipe que j’ai adapté à ce petit bout de quarter fait maison. 
Je vais essayer de vous donner les différentes étapes mais comme pour beaucoup de tricks, je pense que le plus important c’est d’avoir la rotation en tête et après c’est beaucoup de feeling. 
En premier il faut déjà prendre le bon speed, bien adapté au spot que vous ridez. Ensuite, pour utiliser tout le potentiel de votre spot, il faut bien attendre la toute fin du kick/courbe pour lancer le trick. 
On arrive board à plat, on laisse sortir le nose et, à ce moment-là, on pope. 
Si vous déclenchez trop tôt, vous allez perdre en hauteur et surtout risquer de replaquer sur le coping ! Donc on se laisse bien sortir et une fois en l’air on envoie l’épaule gauche et la tête pour commencer la rotation. 
Ensuite on vient rapidement grabber avec l’autre main et on reste en boule tout le long pour que la rotation soit fluide.
Et enfin, comme pour la plupart des tricks, on vient chercher la réception avec le regard afin d’anticiper. Si vous êtes dans le bon timing tout se passera bien.
Le plus simple pour apprendre reste de se lancer, donc je vous conseille d’essayer, vous allez voir c’est pas si dur !
')
            ->setImage($this->getReference('image9'))
            ->setCategory($this->getReference('Switch4'))
            ->setVideo($this->getReference('video9'));

        $manager->persist($trick);
        $manager->persist($trick1);
        $manager->persist($trick2);
        $manager->persist($trick3);
        $manager->persist($trick4);
        $manager->persist($trick5);
        $manager->persist($trick6);
        $manager->persist($trick7);
        $manager->persist($trick8);
        $manager->persist($trick9);

        $this->addReference('trick', $trick);
        $this->addReference('trick1', $trick1);
        $this->addReference('trick2', $trick2);
        $this->addReference('trick3', $trick3);
        $this->addReference('trick4', $trick4);
        $this->addReference('trick5', $trick5);
        $this->addReference('trick6', $trick6);
        $this->addReference('trick7', $trick7);
        $this->addReference('trick8', $trick8);
        $this->addReference('trick9', $trick9);


        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            CategoryFixtures::class,
            VideoFixtures::class,
            ImageFixtures::class,
        );
    }
}
