<?php 

namespace AppBundle\Entity;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InterestRepository")
 * @ORM\Table(name="Loisirs")
 * @ApiResource
 **/

class Interest { 
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer") 
     * @ORM\GeneratedValue(strategy="AUTO")
    **/
    protected $id;
    
    /**
     * @ORM\Column(type="string", name="name") 
    **/
    private $name;

    public function getId()
    {
        return $this->id;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    
    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;
    }
    
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;
    }
}