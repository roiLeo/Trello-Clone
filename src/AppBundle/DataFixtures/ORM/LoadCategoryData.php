<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 13/03/2017
 * Time: 14:16
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use AppBundle\Entity\Category;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $names = [
            'A faire',
            'En cours',
            'Terminee',
            'Bugs / Retours',
        ];
        foreach ($names as $i => $name) {
            $category = new Category();
            $category->setName($name);
            $manager->persist($category);
            $this->addReference('cat-'.$i, $category);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 7;
    }
}