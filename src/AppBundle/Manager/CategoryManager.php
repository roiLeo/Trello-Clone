<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 14/03/2017
 * Time: 11:37
 */

namespace AppBundle\Manager;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Category;

/**
 * Class CategoryManager
 * @package AppBundle\Manager
 */
class CategoryManager
{
    private $em;

    /**
     * CategoryManager constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @return \AppBundle\Repository\CategoryRepository|\Doctrine\ORM\EntityRepository
     */
    public function listCat()
    {
        return $this->em->getRepository(Category::class)->getCategories();
    }

}