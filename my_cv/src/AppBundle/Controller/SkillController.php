<?php
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\SkillType;
use AppBundle\Entity\Skill;

/**
 * @Route("/skills")
 */
class SkillController extends Controller
{
    /**
     * @Route("/create", name="create_skill")
     * @Template()
     */
    public function createAction()
    {
        $skill = new Skill();
        $form = $this->createForm(SkillType::class, $skill);
        return array(
            'entity' => $skill,
            'form' => $form->createView(),
        );
    }
    /**
     * @Route("/create_valid", name="validate_create_skill")
     * @Method("POST")
     */
    public function validateSkillAction(Request $request)
    {
        $skill = new Skill();
        $form = $this->createForm(SkillType::class, $skill);
        $form->handleRequest($request); 
        if ($form->isSubmitted() && $form->isValid()) {
            $eManager = $this->getDoctrine()->getManager();
            $eManager->persist($skill);
            $eManager->flush();
            return $this->redirectToRoute('homepage');
        }
        return $this->redirectToRoute('create_skill', array(
            'entity' => $skill,
            'form' => $form->createView(),
        ));
    }
    
    /**
     * @Route("/edit/{id}", name="edit_skill")
     * @Template()
     */
    public function editAction($id)
    {
        $eManager = $this->getDoctrine()->getManager();
        $skill = $eManager->getRepository("AppBundle:Skill")->FindOneBy(["id" => $id]);
        $form = $this->createForm(SkillType::class, $skill);
        return array(
            'entity' => $skill,
            'form' => $form->createView(),
        );
    }
    /**
     * @Route("/edit_valid/{id}", name="validate_edit_skill")
     * @Method("POST")
     */
    public function validateEditSkillAction(Request $request, $id)
    {
        $eManager = $this->getDoctrine()->getManager();
        $skill = $eManager->getRepository("AppBundle:Skill")->FindOneBy(["id" => $id]);
        $form = $this->createForm(SkillType::class, $skill);
        $form->handleRequest($request); 
        if ($form->isSubmitted() && $form->isValid()) {
            $eManager->persist($skill);
            $eManager->flush();
            return $this->redirectToRoute('homepage');
        }
        return $this->redirectToRoute('create_skill', array(
            'entity' => $skill,
            'form' => $form->createView(),
        ));
    }
    
    /**
     * @Route("/delete/{id}", name="delete_skill")
     * @Template()
     */
    public function deleteAction($id)
    {
        $eManager = $this->getDoctrine()->getManager();
        $skill = $eManager->getRepository("AppBundle:Skill")->FindOneBy(["id" => $id]);
        $eManager->remove($skill);
        $eManager->flush();
        return $this->redirectToRoute('homepage');
    }
}

