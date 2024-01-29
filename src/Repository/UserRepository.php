<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

/**
 * @extends ServiceEntityRepository<User>
 *
 * @implements PasswordUpgraderInterface<User>
 *
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }


    /**
     * Met à jour le mot de passe de l'utilisateur
     * Cette méthode est utilisée pour mettre à jour le mot de passe d'un utilisateur après une opération de réinitialisation de mot de passe ou de changement de mot de passe
     *
     * @param PasswordAuthenticatedUserInterface $user L'utilisateur pour lequel le mot de passe doit être mis à jour
     * @param string $newHashedPassword Le nouveau mot de passe haché
     *
     * @throws UnsupportedUserException Si l'utilisateur n'est pas une instance de la classe User
     *
     * @return void
     */

    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', $user::class));
        }

        $user->setPassword($newHashedPassword);
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();
    }


    /**
     * Recherche des utilisateurs par leur prénom ou nom
     * Cette méthode effectue une recherche dans la base de données pour trouver des utilisateurs dont le prénom ou le nom correspond à la requête fournie
     *
     * @param string $query La requête de recherche pour le prénom ou le nom
     *
     * @return array Un tableau d'objets User correspondant à la recherche
     */

    public function findUserByName(string $query): array
    {
        $queryBuilder = $this->createQueryBuilder('user');

        $searchConditions = $queryBuilder->expr()->orX(
            $queryBuilder->expr()->like('user.firstName', ':query'),
            $queryBuilder->expr()->like('user.lastName', ':query')
        );

        $queryBuilder
            ->where($searchConditions)
            ->setParameter('query', "%{$query}%");

        return $queryBuilder->getQuery()->getResult();
    }
}
