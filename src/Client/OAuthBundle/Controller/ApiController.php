<?php
/**
 * Created by PhpStorm.
 * User: Fehiniaina
 * Date: 20/02/15
 * Time: 10:28
 */
namespace Client\OAuthBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;


class ApiController extends Controller
{
    public function indexAction()
    {
        $articles = array('article1', 'article2', 'article3');
        return new JsonResponse($articles);
    }

    public function userAction()
    {
        $user = $this->container->get('security.context')->getToken()->getToken();

        $profil = $this->getDoctrine()->getRepository('ServerOAuthBundle:Users')->getUserByToken($user);

        if($profil) {
            $data = array();
            foreach ( $profil as $key ) {

                $data['email']    =  $key['email'];
                $data['password'] =  $key['password'];

            }
            return new JsonResponse($data);
        }

        return new JsonResponse(array(
            'message' => 'User is not identified'
        ));

    }

}