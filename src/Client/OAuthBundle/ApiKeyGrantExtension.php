<?php
/**
 * Created by PhpStorm.
 * User: Fehiniaina
 * Date: 23/02/15
 * Time: 14:10
 */

namespace Client\OAuthBundle;

use Doctrine\Common\Persistence\ObjectRepository;
use FOS\OAuthServerBundle\Storage\GrantExtensionInterface;
use OAuth2\Model\IOAuth2Client;

class ApiKeyGrantExtension implements  GrantExtensionInterface
{

    private $userRepository;

    function __construct(ObjectRepository $userRepository)
    {
        // TODO: Implement __construct() method.
        $this->userRepository = $userRepository;
    }

    /**
     * @see OAuth2\IOAuth2GrantExtension::checkGrantExtension
     */
    public function checkGrantExtension(IOAuth2Client $client, array $inputData, array $authHeaders)
    {
        // TODO: Implement checkGrantExtension() method.
        $user = $this->userRepository->findOneByApiKey($inputData['api_key']);

        if ($user) {
            //if you need to return access token with associated user
            return array(
                'data' => $user
            );

            //if you need an anonymous user token
            return true;
        }

        return false;

    }


}