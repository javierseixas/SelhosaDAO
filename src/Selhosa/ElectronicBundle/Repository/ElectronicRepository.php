<?php

namespace Selhosa\ElectronicBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ElectronicRepository extends EntityRepository
{
    public function findAllModels($brandId = 1)
    {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('e.model')
            ->from('SelhosaElectronicBundle:Electronic','e')
            // TODO Falta el Join con categories para poder buscar por Brand
            //->where($qb->expr()->eq('e.brand', ':brandId'))
            //->setParameter('brandId', $brandId);
            ->orderBy('e.model', 'ASC')
        ;

        $query = $qb->getQuery();

        $electronics = $query->getArrayResult();

        return array_map(function ($electronic) { return $electronic['model']; }, $electronics);
    }

}
