<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 14/03/2017
 * Time: 15:06
 */

namespace AppBundle\Manager;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Task;

/**
 * Class TaskManager
 * @package AppBundle\Manager
 */
class TaskManager
{
    private $em;

    /**
     * TaskManager constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @return Task
     */
    public function create()
    {
        return new Task();
    }

    /**
     * @param Task $task
     */
    public function save(Task $task)
    {
        if (null === $task->getId()){
            $em = $this->em;
            $em -> persist($task);
        }
        $this-> em -> flush();
    }

    /**
     * @param Task $task
     */
    public function del(Task $task)
    {
        if (null === $task->getId()){
            $em = $this->em;
            $em -> remove($task);
        }
        $this->em->flush();
    }
}