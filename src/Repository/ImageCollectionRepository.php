<?php

namespace App\Repository;

use App\Entity\ImageCollection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ImageCollection|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImageCollection|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImageCollection[]    findAll()
 * @method ImageCollection[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageCollectionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ImageCollection::class);
    }

    // /**
    //  * @return ImageCollection[] Returns an array of ImageCollection objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ImageCollection
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
