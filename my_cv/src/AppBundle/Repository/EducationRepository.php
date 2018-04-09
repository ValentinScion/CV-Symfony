<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Education Repository
 **/
 class EducationRepository extends EntityRepository
 {
    /**
     * Find...
     **/ 
    public function FindAllEducations()
    {
        $qBuilder->$this
            ->getEntityManager()
            ->createQueryBuilder();
        $qBuilder->select('f');
        $qBuilder->from('AppBundle:Education', 'f');
        
        $result = $qBuilder->getQuery()->getResult();
        return $result;
    }
 }