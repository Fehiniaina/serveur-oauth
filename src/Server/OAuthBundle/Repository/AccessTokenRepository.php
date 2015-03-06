<?php
/**
 * Created by PhpStorm.
 * User: Fehiniaina
 * Date: 19/02/15
 * Time: 17:25
 */
namespace Server\OAuthBundle\Repository;

use Doctrine\ORM\EntityRepository;

class AccessTokenRepository extends EntityRepository
{
    public function getAccessToken( $clientid )
    {
        $em = $this->createQueryBuilder('ac')
                   ->where('ac.id = :client_id')
                   ->setParameter('client_id',$clientid)
                   ->getQuery();

        $result = $em->getResult();

        return $result;
    }
}