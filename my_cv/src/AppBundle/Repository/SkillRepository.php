<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Skill Repository
 **/
 class SkillRepository extends EntityRepository
 {
    /**
     * Find...
     **/ 
    public function FindAllSkills()
    {
        $qBuilder->$this
            ->getEntityManager()
            ->createQueryBuilder();
        $qBuilder->select('f');
        $qBuilder->from('AppBundle:Skill', 'f');
        
        $result = $qBuilder->getQuery()->getResult();
        return $result;
    }
 }