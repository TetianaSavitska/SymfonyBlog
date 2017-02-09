<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
    public function indexAction()
    {
    	$posts = $this
    		->getDoctrine()
    		->getRepository('BlogBundle:Post')
    		->findBy([], ['publishedAt' => 'DESC'], 3);

        return $this->render('BlogBundle:Blog:index.html.twig', [
        	'posts' => $posts,
        ]);
    }

    public function postAction($postId)
    {
        $post = $this
            ->getDoctrine()
            ->getRepository('BlogBundle:Post')
            ->find($postId);

        return $this->render('BlogBundle:Blog:post.html.twig', [
            'post' => $post,
        ]);
    }

    public function sidebarAction()
    {
        $authors = $this
            ->getDoctrine()
            ->getRepository('BlogBundle:Author')
            ->findBy([], ['name' => "ASC"]);

        $tags = $this
            ->getDoctrine()
            ->getRepository('BlogBundle:Tag')
            ->findBy([], ['title' => "ASC"]);

        return $this->render('BlogBundle:Layout:sidebar.html.twig', [
            'authors' => $authors,
            'tags' => $tags
        ]);
    }

    public function authorAction($authorId)
    {
        $author = $this
            ->getDoctrine()
            ->getRepository('BlogBundle:Author')
            ->find($authorId);       

        return $this->render('BlogBundle:Blog:author.html.twig', [
            'author' => $author,
        ]);
    }

    public function authorsAction()
    {
        $authors = $this
            ->getDoctrine()
            ->getRepository('BlogBundle:Author')
            ->findAll();

        return $this->render('BlogBundle:Blog:authors.html.twig', [
            'authors' => $authors,
        ]);
    }

    public function tagsAction()
    {
        $tags = $this
            ->getDoctrine()
            ->getRepository('BlogBundle:Tag')
            ->findBy([], ['title' => "ASC"]);

        return $this->render('BlogBundle:Blog:tags.html.twig', [
            'tags' => $tags
        ]);
    }

    public function tagAction($tagId)
    {
        $tag = $this
            ->getDoctrine()
            ->getRepository('BlogBundle:Tag')
            ->find($tagId);

        return $this->render('BlogBundle:Blog:tag.html.twig', [
            'tag' => $tag,
        ]);
    }
}
