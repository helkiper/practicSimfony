<?php
/**
 * Created by PhpStorm.
 * User: Hellkiper
 * Date: 14.04.2018
 * Time: 13:53
 */

namespace Helkiper\PostBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    /**
     * @return Response
     *
     * @Route(name="post_index", path="/")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $posts = $em->getRepository('HelkiperPostBundle:Post')->findAll();

        return $this->render('@HelkiperPostBundle/Post/index.html.twig', [
            'posts' => $posts
        ]);
    }
}