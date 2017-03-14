<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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

    public function newAction()
    {

    }
}
