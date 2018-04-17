<?php
/**
 * Created by PhpStorm.
 * User: Hellkiper
 * Date: 14.04.2018
 * Time: 13:53
 */

namespace Helkiper\PostBundle\Controller;


use Helkiper\PostBundle\Entity\Post;
use Helkiper\PostBundle\Form\PostType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostController extends Controller
{
    /**
     * @Route(name="post_index", path="/")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $post = new Post();
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($post);
            $em->flush();

            return new RedirectResponse($this->generateUrl('post_index'));
        }

        $post_list = $em->getRepository('HelkiperPostBundle:Post')->findAll();

        return $this->render('@HelkiperPostBundle/Post/index.html.twig', [
            'posts' => $post_list,
            'form' => $form->createView()
        ]);
    }

    /**
     * @param int $id
     *
     * @Route(name="post_show", path="/show/{id}")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository('HelkiperPostBundle:Post')->find($id);

        if ($post === null) {
            throw new NotFoundHttpException('Not found');
        }

        return $this->render('@HelkiperPostBundle/Post/show.html.twig', [
            'post' => $post
        ]);
    }
}