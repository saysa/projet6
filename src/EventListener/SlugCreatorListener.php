<?php
/**
 * Created by PhpStorm.
 * User: Dimitri
 * Date: 11/11/2018
 * Time: 02:54
 */

namespace App\EventListener;


use App\Entity\Trick;
use App\SlugCreator\SlugCreator;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;

class SlugCreatorListener
{
    /**
     * @var SlugCreator
     */
    private $slugCreator;

    /**
     * SlugCreatorListener constructor.
     * @param SlugCreator $slugCreator
     */
    public function __construct(SlugCreator $slugCreator)
    {

        $this->slugCreator = $slugCreator;
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        if (!$entity instanceof Trick) {
            return;
        }

        $slug = $this->slugCreator->createSlug($entity);

        $entity->setSlug($slug);
    }
}
