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

/**
 * @Route("/actualites", name="actualites")
 */
class ActualityController extends AbstractController {

    /**
     * @Route("", name="")
     */
    public function actuality() :Response
    {
        return $this->render('actuality/actuality.html.twig');
    }
}
