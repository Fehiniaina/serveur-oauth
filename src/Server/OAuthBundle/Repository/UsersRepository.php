<?php
/**
 * Created by PhpStorm.
 * User: Fehiniaina
 * Date: 17/02/15
 * Time: 17:59
 */
namespace Server\OAuthBundle\Repository;

use Doctrine\ORM\EntityRepository;

class UsersRepository extends EntityRepository
{

    public function getUserByToken($token)
    {
        $sql = 'SELECT u.*
                FROM users u
                JOIN accesstoken ac ON u.id = ac.client_id
                WHERE ac.token="'.$token.'"';

        $query = $this->getEntityManager()
                      ->getConnection()
                      ->prepare($sql);

        $query->execute();
        $result = $query->fetchAll();

        return $result;

    }

}