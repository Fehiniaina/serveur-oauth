<?php
/**
 * Created by PhpStorm.
 * User: Fehiniaina
 * Date: 23/02/15
 * Time: 14:39
 */

namespace Client\OAuthBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class AuthController extends Controller
{
    /**
     * @Route("/authorize", name="auth")
     */
    public function authAction(Request $request)
    {
        $authorizeClient = $this->container->get('stark_industries_client.authorize_client');

        if (!$request->query->get('code')) {
            return new RedirectResponse($authorizeClient->getAuthenticationUrl());
        }

        $authorizeClient->getAccessToken($request->query->get('code'));

        return new Response($authorizeClient->fetch('http://localhost/ServerOAuth/web/app_dev.php/api/articles'));
    }

} 