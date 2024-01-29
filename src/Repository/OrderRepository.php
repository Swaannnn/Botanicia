<?php

namespace App\Repository;

use App\Entity\Order;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\ResultSetMapping;


/**
 * @extends ServiceEntityRepository<Order>
 *
 * @method Order|null find($id, $lockMode = null, $lockVersion = null)
 * @method Order|null findOneBy(array $criteria, array $orderBy = null)
 * @method Order[]    findAll()
 * @method Order[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Order::class);
    }


    /**
     * Obtient les quantités totales d'articles par date
     * Cette méthode exécute une requête SQL native pour récupérer les quantités totales d'articles groupées par date à partir des tables `order` et `order_item`
     *
     * @return array Un tableau associatif contenant les résultats avec les clés 'date' et 'totalQuantity'
     */

    public function getTotalQuantitiesByDate(): array
    {
        $rsm = new ResultSetMapping();
        $rsm->addScalarResult('date', 'date');
        $rsm->addScalarResult('total_quantity', 'totalQuantity');

        $sql = '
            SELECT o.date, SUM(oi.quantity) AS total_quantity
            FROM `order` o
            JOIN `order_item` oi ON o.id = oi.orderr_id
            GROUP BY o.date
            ORDER BY o.date
        ';

        $query = $this->getEntityManager()->createNativeQuery($sql, $rsm);

        return $query->getResult();
    }
}
