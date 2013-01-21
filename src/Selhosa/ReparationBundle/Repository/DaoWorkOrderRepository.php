<?php

namespace Selhosa\ReparationBundle\Repository;

use Doctrine\ORM\EntityRepository;

class DaoWorkOrderRepository extends EntityRepository
{
    public function findByStatus($statusId)
    {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('wo')
            ->from('SelhosaReparationBundle:DaoWorkOrder','dwo')
            ->innerJoin('dwo.id','wo')
            ->innerJoin('wo.currentStatus','wos')
            ->where($qb->expr()->eq('wo.currentStatus', ':status_id'))
            ->setParameter('status_id', $statusId);
        ;

        $query = $qb->getQuery();

        return $query->getResult();
    }
}
