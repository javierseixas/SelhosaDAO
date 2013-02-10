<?php

namespace Selhosa\RepairBundle\Repository;

use Doctrine\ORM\EntityRepository;

class RepairRepository extends EntityRepository
{
    /**
     * @param $statusId
     * @return array
     */
    public function findByStatus($statusId)
    {

        $qb = $this->_em->createQueryBuilder();
        $qb->select('dwo')
            ->from('SelhosaRepairBundle:Repair','dwo')
            ->innerJoin('dwo.current_status','wos')
            ->where($qb->expr()->eq('dwo.current_status', ':status_id'))
            ->setParameter('status_id', $statusId);
        ;

        $query = $qb->getQuery();

        return $query->getResult();
    }
    /**
     * @param $statusId
     * @return array
     */
    public function findByStatusAndUser($statusId,$userId)
    {

        $qb = $this->_em->createQueryBuilder();
        $qb->select('dwo')
            ->from('SelhosaRepairBundle:Repair','dwo')
            ->innerJoin('dwo.current_status','wos')
            ->innerJoin('dwo.technicians','u')
            ->where($qb->expr()->eq('dwo.current_status', ':status_id'))
            ->andWhere($qb->expr()->eq('u.id',':user_id'))
            ->setParameter('status_id',$statusId)
            ->setParameter('user_id',$userId)
        ;

        $query = $qb->getQuery();

        return $query->getResult();
    }
}
