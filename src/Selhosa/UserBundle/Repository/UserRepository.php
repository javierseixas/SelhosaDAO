<?php

namespace Selhosa\UserBundle\Repository;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    public function findUsersByRole($roleKey)
    {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('u')
            ->from('UserBundle:User','u')
            ->where($qb->expr()->like('u.roles', ':roleKey'))
            ->setParameter('roleKey','%'.$roleKey.'%');
        ;

        $query = $qb->getQuery();

        return $query->getResult();
    }

}
