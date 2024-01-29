<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Product>
 *
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    /**
     * Recherche d'articles par nom ou marque
     *
     * @param string $query Le terme de recherche
     *
     * @return array Les articles correspondants
     */
    public function findArticlesByName(string $query): array
    {
        $queryBuilder = $this->createQueryBuilder('article');

        $searchConditions = $queryBuilder->expr()->orX(
            $queryBuilder->expr()->like('article.name', ':query'),
            $queryBuilder->expr()->like('article.brand', ':query')
        );

        $queryBuilder
            ->where($searchConditions)
            ->setParameter('query', "%{$query}%");

        return $queryBuilder->getQuery()->getResult();
    }
}
