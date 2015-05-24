<?php namespace Blogger\BlogBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class AdminController extends Controller
{
    /**
     * @Route("/admin", name="BloggerBlogBundle_admin")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function indexAction()
    {
        return new Response('Admin page!');
    }
}