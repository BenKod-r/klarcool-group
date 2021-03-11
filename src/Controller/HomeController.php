<?php
/**
 * Created by IntelliJ IDEA.
 * User: Benharrat Khaled.
 * Date: 22/09/2020.
 * Time: 17:30
 */
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    /**
     * @Route("/", name="home_index")
     * @return Response
     */
    public function home() :Response
    {
        return $this->render('home.html.twig');
    }
}
