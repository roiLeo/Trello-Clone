<?php

namespace AppBundle\Repository;

/**
 * CategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategoryRepository extends \Doctrine\ORM\EntityRepository
{
    public function getCategories()
    {
        return $this->createQueryBuilder('t')
            ->select('t')
            ->getQuery()
            ->getResult();
    }
}
