<?php
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\EducationType;
use AppBundle\Entity\Education;

/**
 * @Route("/educations")
 */
class EducationController extends Controller
{
    /**
     * @Route("/create", name="create_education")
     * @Template()
     */
    public function createAction()
    {
        $education = new Education();
        $form = $this->createForm(EducationType::class, $education);
        return array(
            'entity' => $education,
            'form' => $form->createView(),
        );
    }
    /**
     * @Route("/create_valid", name="validate_create_education")
     * @Method("POST")
     */
    public function validateEducationAction(Request $request)
    {
        $education = new Education();
        $form = $this->createForm(EducationType::class, $education);
        $form->handleRequest($request); 
        if ($form->isSubmitted() && $form->isValid()) {
            $eManager = $this->getDoctrine()->getManager();
            $eManager->persist($education);
            $eManager->flush();
            return $this->redirectToRoute('homepage');
        }
        return $this->redirectToRoute('create_education', array(
            'entity' => $education,
            'form' => $form->createView(),
        ));
    }
    
    /**
     * @Route("/edit/{id}", name="edit_education")
     * @Template()
     */
    public function editAction($id)
    {
        $eManager = $this->getDoctrine()->getManager();
        $education = $eManager->getRepository("AppBundle:Education")->FindOneBy(["id" => $id]);
        $form = $this->createForm(EducationType::class, $education);
        return array(
            'entity' => $education,
            'form' => $form->createView(),
        );
    }
    /**
     * @Route("/edit_valid/{id}", name="validate_edit_education")
     * @Method("POST")
     */
    public function validateEditEducationAction(Request $request, $id)
    {
        $eManager = $this->getDoctrine()->getManager();
        $education = $eManager->getRepository("AppBundle:Education")->FindOneBy(["id" => $id]);
        $form = $this->createForm(EducationType::class, $education);
        $form->handleRequest($request); 
        if ($form->isSubmitted() && $form->isValid()) {
            $eManager->persist($education);
            $eManager->flush();
            return $this->redirectToRoute('homepage');
        }
        return $this->redirectToRoute('create_education', array(
            'entity' => $education,
            'form' => $form->createView(),
        ));
    }

 /**
     * @Route("/delete/{id}", name="delete_education")
     * @Template()
     */
    public function deleteAction($id)
    {
        $eManager = $this->getDoctrine()->getManager();
        $education = $eManager->getRepository("AppBundle:Education")->FindOneBy(["id" => $id]);
        $eManager->remove($education);
        $eManager->flush();
        return $this->redirectToRoute('homepage');
    }
}
