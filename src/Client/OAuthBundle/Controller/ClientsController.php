<?php
/**
 * Created by PhpStorm.
 * User: Fehiniaina
 * Date: 18/02/15
 * Time: 11:27
 */

namespace Client\OAuthBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class ClientsController
 * @package Client\OAuthBundle\Controller
 */
class ClientsController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $token =  $this->getDoctrine()->getRepository('ServerOAuthBundle:AccessToken')->getAccessToken(1);
        $profil = "";
        foreach ($token as $key) {
            $profil = $em->getRepository('ServerOAuthBundle:Users')->getUserByToken($key->getToken());
        }

        return $this->render('ClientOAuthBundle:Profil:index.html.twig',array('data'=>$profil));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function profilAction()
    {
        return $this->render('ClientOAuthBundle:Profil:index.html.twig');
    }

    public function loginAction()
    {
        return $this->render('ClientOAuthBundle:login:login.html.twig');
    }

}