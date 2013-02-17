<?php

namespace Selhosa\ElectronicBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ElectronicCategoryRepository extends EntityRepository
{
    public function findByBrand($brandId)
    {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('c')
            ->from('SelhosaElectronicBundle:ElectronicCategory','c')
            ->where($qb->expr()->eq('c.brand', ':brandId'))
            ->setParameter('brandId', $brandId);
        ;

        $query = $qb->getQuery();

        return $query->getArrayResult();
    }
}
