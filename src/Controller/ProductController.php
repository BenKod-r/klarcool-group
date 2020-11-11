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
 * @Route("/produits", name="product")
 */
class ProductController extends AbstractController {

    /**
     * @Route("", name="")
     */
    public function activities() :Response
    {
        return $this->render('products/index.html.twig');
    }

    /**
     * @Route("/duraclim", name="_duraclim")
     */
    public function duracool() :Response
    {
        return $this->render('products/duraclim.html.twig');
    }

    /**
     * @Route("/motorklar", name="_motorklar")
     */
    public function motorklar() :Response
    {
        return $this->render('products/motorklar.html.twig');
    }

    /**
     * @Route("/durapac", name="_durapac")
     */
    public function durapac() :Response
    {
        return $this->render('products/durapac.html.twig');
    }
}
