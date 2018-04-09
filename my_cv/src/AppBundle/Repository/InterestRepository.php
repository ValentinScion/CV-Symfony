<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Interest Repository
 **/
 class InterestRepository extends EntityRepository
 {
    /**
     * Find...
     **/ 
    public function FindAllInterests()
    {
        $qBuilder->$this
            ->getEntityManager()
            ->createQueryBuilder();
        $qBuilder->select('f');
        $qBuilder->from('AppBundle:Interest', 'f');
        
        $result = $qBuilder->getQuery()->getResult();
        return $result;
    }
 }