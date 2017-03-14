<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 13/03/2017
 * Time: 14:15
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use AppBundle\Entity\Task;

class LoadTaskData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {


        $tasks = [
            [
                'name' => 'Custom storage',
                'description' => 'Using a custom storage layerUsing a custom storage layer',
                'category' => $this->getReference('cat-0'),
                'status' => 'open',
            ],
            [
                'name' => 'Hooking controllers',
                'description' => 'Hooking into the controllers',
                'category' => $this->getReference('cat-1'),
                'status' => 'open',
            ],
            [
                'name' =>  'Configuration',
                'description' =>  'Advanced routing configuration',
                'category' => $this->getReference('cat-2'),
                'status' => 'open',
            ],
            [
                'name' =>  'API',
                'description' =>  'One API to rule all product data ',
                'category' => $this->getReference('cat-3'),
                'status' => 'open',
            ],
            [
                'name' =>  'Symfony3',
                'description' => 'Getting Pushy with Symfony3',
                'category' => $this->getReference('cat-3'),
                'status' => 'open',
            ],
        ];



        foreach ($tasks as $data) {
            $task = new Task();
            $task->setDescription($data['description']);
            $task->setName($data['name']);
            $task->setCategory($data['category']);
            $task->setStatus($data['status']);
            $manager->persist($task);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 10;
    }
}