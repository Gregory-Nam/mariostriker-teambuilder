<?php

namespace App\Repository;

use App\Entity\PersonnageEquipement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PersonnageEquipement>
 *
 * @method PersonnageEquipement|null find($id, $lockMode = null, $lockVersion = null)
 * @method PersonnageEquipement|null findOneBy(array $criteria, array $orderBy = null)
 * @method PersonnageEquipement[]    findAll()
 * @method PersonnageEquipement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonnageEquipementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PersonnageEquipement::class);
    }

    public function add(PersonnageEquipement $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(PersonnageEquipement $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return PersonnageEquipement[] Returns an array of PersonnageEquipement objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PersonnageEquipement
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
