<?php

namespace Client\OAuthBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ClientOAuthBundle:Default:index.html.twig', array('name' => "OK"));
    }
}
