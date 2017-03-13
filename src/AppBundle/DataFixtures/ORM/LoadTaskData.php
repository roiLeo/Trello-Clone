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
                'status' => $this->getReference('cat-0'),
            ],
            [
                'name' => 'Hooking controllers',
                'description' => 'Hooking into the controllers',
                'status' => $this->getReference('cat-1'),
            ],
            [
                'name' =>  'Configuration',
                'description' =>  'Advanced routing configuration',
                'status' => $this->getReference('cat-2'),
            ],
            [
                'name' =>  'API',
                'description' =>  'One API to rule all product data ',
                'status' => $this->getReference('cat-3'),
            ],
            [
                'name' =>  'Symfony3',
                'description' => 'Getting Pushy with Symfony3',
                'status' => $this->getReference('cat-3'),
            ],
        ];



        foreach ($tasks as $data) {
            $task = new Task();
            $task->setDescription($data['description']);
            $task->setName($data['name']);
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