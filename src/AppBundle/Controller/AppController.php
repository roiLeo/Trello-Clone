<?php

namespace AppBundle\Controller;

use AppBundle\Form\TaskType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use AppBundle\Entity\Task;

class AppController extends Controller
{
    /**
     * @Route("/", name="app_category_list", methods={"GET"})
     */
    public function listAction()
    {
        $category = $this->container->get("app.category_manager");
        return $this->render(':default:index.html.twig', ['category' => $category->listCat()]);
    }

    /**
     * @Route("/task/new", name="app_task_new", methods={"GET","POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        $taskManager = $this->container->get('app.task_manager');
        $form = $this->createForm(TaskType::class,$taskManager->create());
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();
            $taskManager->save($task);
            $this->addFlash('success','New Task created');
            return $this->redirectToRoute('app_category_list',['id' => $task->getId()]);
        }
        return $this->render(':task:new.html.twig', ['form' => $form->createView() ]);
    }


    /**
     * @Route("/del/{id}", name="app_task_del", methods={"GET"})
     * @param Task $task
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function delAction(Task $task)
    {
        $taskManager = $this->container->get('app.task_manager');
        $taskManager->del($task);
        $this->addFlash('danger','Task deleted');
        return $this->redirectToRoute('app_category_list',['id' => $task->getId()]);
    }

    /**
     * @Route("/edit/{id}", name="app_task_edit", methods={"GET","POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, Task $task)
    {
        $taskManager = $this->container->get('app.task_manager');
        $form = $this->createForm(TaskType::class,$task);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $taskManager->save($task);
            $this->addFlash('info','Task edited');
            return $this->redirectToRoute('app_category_list',['id' => $task->getId()]);
        }
        return $this->render(':task:edit.html.twig', ['form' => $form->createView(), 'task' => $task  ]);
    }

}
