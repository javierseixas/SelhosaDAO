<?php

namespace Selhosa\ReparationBundle\Repository;

use Doctrine\ORM\EntityRepository;

class DaoWorkOrderRepository extends EntityRepository
{
    public function findByStatus($statusId)
    {

        $qb = $this->_em->createQueryBuilder();
        $qb->select('dwo')
            ->from('SelhosaReparationBundle:WorkOrder','dwo')
            ->innerJoin('dwo.current_status','wos')
            ->where($qb->expr()->eq('dwo.current_status', ':status_id'))
            ->setParameter('status_id', $statusId);
        ;

        $query = $qb->getQuery();

        return $query->getResult();

        /*
        $qb = $this->_em->getConnection()->createQueryBuilder();
        $qb->select('*')
            ->from('DaoWorkOrder','dwo')
            ->innerJoin('dwo','WorkOrder','wo', 'dwo.id = wo.id')
            ->innerJoin('wo','WorkOrderStatus','wos','wo.current_status_id = wos.id')
            ->where($qb->expr()->eq('wo.current_status_id', ':status_id'))
            ->setParameter('status_id', $statusId);
        ;
        return $qb->execute()->fetchAll();
        */
    }
}
