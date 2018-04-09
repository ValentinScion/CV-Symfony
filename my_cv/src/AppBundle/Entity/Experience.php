<?php 

namespace AppBundle\Entity;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ExperienceRepository")
 * @ORM\Table(name="Expérience")
 * @ApiResource
 **/

class Experience { 
    
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
    /**
     * @ORM\Column(type="string", name="dateDebut") 
    **/
    private $dateDebut;
    /**
     * @ORM\Column(type="string", name="dateFin") 
    **/
    private $dateFin;
    /**
     * @ORM\Column(type="string", name="lieu") 
    **/
    private $lieu;
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getDateDebut()
    {
        return $this->dateDebut;
    }
    
    public function getDateFin()
    {
        return $this->dateFin;
    }
    
    public function getLieu()
    {
        return $this->lieu;
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
    
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;
    }
}
