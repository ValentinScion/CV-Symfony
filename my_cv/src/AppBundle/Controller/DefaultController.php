<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/cv/{name}/{firstname}", name="homepage")
     * @Template()
     */
    public function indexAction($name ="Valentin", $firstname = "Scion")
    {
        $Education = $this->getDoctrine()->getRepository('AppBundle:Education')->findAll();
        $Experience = $this->getDoctrine()->getRepository('AppBundle:Experience')->findAll();
        $Skill = $this->getDoctrine()->getRepository('AppBundle:Skill')->findAll();
        $Interest = $this->getDoctrine()->getRepository('AppBundle:Interest')->findAll();
        return array( 'name' => $name, 'firstname' => $firstname, 'Experiences'=>$Experience, 'Educations'=>$Education, 'Skills'=>$Skill, 'Interests'=>$Interest );
    }
}