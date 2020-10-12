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
 * @Route("/blog")
 */
class BlogController extends AbstractController {

    /**
     * @Route("", name="blog")
     */
    public function blog() :Response
    {
        return $this->render('blog/blog.html.twig');
    }

    /**
     * @Route("/blog_details", name="blog_details")
     */
    public function blogDetails() :Response
    {
        return $this->render('blog/blog_details.html.twig');
    }

    /**
     * @Route("/elements", name="elements")
     */
    public function elements() :Response
    {
        return $this->render('blog/elements.html.twig');
    }
}
