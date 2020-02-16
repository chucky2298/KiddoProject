<?php

namespace ReclamationBundle\Controller;

use ReclamationBundle\Entity\Reclamation;
use ReclamationBundle\Form\ReclamationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class ReclamationController extends Controller
{

    public function AjoutAction(Request $request)
    {
        $reclamation=new Reclamation();
        $form=$this->createForm(ReclamationType::class,$reclamation);
        $form->handleRequest($request);
        $reclamation->setEtat(0);
        if($form->isSubmitted()) {
            $m=$this->getDoctrine()->getManager();
            $m->persist($reclamation);
            $m->flush();
           return $this->redirect($this->generateUrl('reclamation_affiche'));
        }



        return $this->render("@Reclamation/Reclamation/ajout.html.twig",array('form'=>$form->createView()));
    }


    public function updateAction(Request $request,$id)
    {
        $em= $this->getDoctrine()->getManager();
        $reclamation= $em->getRepository("ReclamationBundle:Reclamation")->find($id);
        $form= $this->createForm(ReclamationType::class,$reclamation);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $em->persist($reclamation);
            $em->flush();
            return $this->redirectToRoute("reclamation_affiche");
        }
        return $this->render("@Reclamation/Reclamation/update.html.twig",array('form'=>$form->createView()));    }

    /**
     * @Route("/delete")
     */
    public function deleteAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $reclamation= $em->getRepository("ReclamationBundle:Reclamation")->find($id);
        $em->remove($reclamation);
        $em->flush();
        return $this->redirectToRoute("reclamation_affiche");
    }

    /**
     * @Route("/afficher")
     */
    public function afficherAction()
    {
        $em= $this->getDoctrine()->getManager();
        $reclamation= $em->getRepository("ReclamationBundle:Reclamation")->findAll();
        return $this->render("@Reclamation/Reclamation/afficher.html.twig",array('reclamations'=>$reclamation));

    }



}
