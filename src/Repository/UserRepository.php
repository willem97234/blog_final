<?php
/**
 * Created by PhpStorm.
 * User: Will
 * Date: 01/01/2019
 * Time: 21:46
 */

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    public function findAllOrderedByName()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM App:User p ORDER BY p.name ASC'
            )
            ->getResult();
    }
}