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
 * @Route("/activites", name="activities")
 */
class ActivityController extends AbstractController {

    /**
     * @Route("", name="")
     */
    public function activities() :Response
    {
        return $this->render('actuality/actuality.html.twig');
    }

    /**
     * @Route("/duraclim", name="_duraclim")
     */
    public function duracool() :Response
    {
        return $this->render('activities/duraclim.html.twig');
    }

    /**
     * @Route("/motorklar", name="_motorklar")
     */
    public function climakool() :Response
    {
        return $this->render('activities/motorklar.html.twig');
    }

    /**
     * @Route("/durapac", name="_durapac")
     */
    public function ecorop() :Response
    {
        return $this->render('activities/durapac.html.twig');
    }

    /**
     * @Route("/blog_details", name="_details")
     */
    public function details() :Response
    {
        return $this->render('activities/blog_details.html.twig');
    }

    /**
     * @Route("/buttons", name="_buttons")
     */
    public function buttons() :Response
    {
        return $this->render('WAIT/buttons.html.twig');
    }

    /**
     * @Route("/what", name="_what")
     */
    public function what() :Response
    {
        return $this->render('what_do/what_do.html.twig');
    }
}
