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
 * @Route("/eco-activites")
 */
class ActivityController extends AbstractController {

    /**
     * @Route("", name="eco-activites")
     */
    public function ecoActivity() :Response
    {
        return $this->render('activity/eco-activity.twig');
    }
}