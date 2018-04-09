<?php
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\InterestType;
use AppBundle\Entity\Interest;

/**
 * @Route("/interests")
 */
class InterestController extends Controller
{
    /**
     * @Route("/create", name="create_interest")
     * @Template()
     */
    public function createAction()
    {
        $interest = new Interest();
        $form = $this->createForm(InterestType::class, $interest);
        return array(
            'entity' => $interest,
            'form' => $form->createView(),
        );
    }
    /**
     * @Route("/create_valid", name="validate_create_interest")
     * @Method("POST")
     */
    public function validateInterestAction(Request $request)
    {
        $interest = new Interest();
        $form = $this->createForm(InterestType::class, $interest);
        $form->handleRequest($request); 
        if ($form->isSubmitted() && $form->isValid()) {
            $eManager = $this->getDoctrine()->getManager();
            $eManager->persist($interest);
            $eManager->flush();
            return $this->redirectToRoute('homepage');
        }
        return $this->redirectToRoute('create_interest', array(
            'entity' => $interest,
            'form' => $form->createView(),
        ));
    }
    
    /**
     * @Route("/edit/{id}", name="edit_interest")
     * @Template()
     */
    public function editAction($id)
    {
        $eManager = $this->getDoctrine()->getManager();
        $interest = $eManager->getRepository("AppBundle:Interest")->FindOneBy(["id" => $id]);
        $form = $this->createForm(InterestType::class, $interest);
        return array(
            'entity' => $interest,
            'form' => $form->createView(),
        );
    }
    /**
     * @Route("/edit_valid/{id}", name="validate_edit_interest")
     * @Method("POST")
     */
    public function validateEditInterestAction(Request $request, $id)
    {
        $eManager = $this->getDoctrine()->getManager();
        $interest = $eManager->getRepository("AppBundle:Interest")->FindOneBy(["id" => $id]);
        $form = $this->createForm(InterestType::class, $interest);
        $form->handleRequest($request); 
        if ($form->isSubmitted() && $form->isValid()) {
            $eManager->persist($interest);
            $eManager->flush();
            return $this->redirectToRoute('homepage');
        }
        return $this->redirectToRoute('create_interest', array(
            'entity' => $interest,
            'form' => $form->createView(),
        ));
    }
    
    /**
     * @Route("/delete/{id}", name="delete_interest")
     * @Template()
     */
    public function deleteAction($id)
    {
        $eManager = $this->getDoctrine()->getManager();
        $interest = $eManager->getRepository("AppBundle:Interest")->FindOneBy(["id" => $id]);
        $eManager->remove($interest);
        $eManager->flush();
        return $this->redirectToRoute('homepage');
    }
}

