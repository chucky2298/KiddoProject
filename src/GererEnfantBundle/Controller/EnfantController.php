<?php

namespace GererEnfantBundle\Controller;

use GererEnfantBundle\Entity\Enfant;
use GererEnfantBundle\Form\EnfantType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EnfantController extends Controller
{
    public function ajoutEnfantAction(Request $request)
    {
        $enfant = new enfant();
        $form = $this->createForm(EnfantType::class, $enfant);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($enfant);
            $em->flush();
            return $this->redirectToRoute('afficheEnfant');
        }
        return $this->render("@GererEnfant/Enfant/addEnfant.html.twig", array('form' => $form->createView()));
    }

    public function afficheEnfantAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $enfant = $em->getRepository("GererEnfantBundle:Enfant")->findAll();
        return $this->render("@GererEnfant/Enfant/afficheEnfant.html.twig", array('Enfant' => $enfant));

    }

    public function updateEnfantAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $enfant = $em->getRepository("GererEnfantBundle:Enfant")->find($id);
        $form = $this->createForm(EnfantType::class, $enfant);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {


            $em = $this->getDoctrine()->getManager();
            $em->persist($enfant);
            $em->flush();
            return $this->redirectToRoute('afficheEnfant');
        }
        return $this->render("@GererEnfant/Enfant/updateEnfant.html.twig", array('form' => $form->createView()));
    }

    public function deleteEnfantAction(Request $request, $id)
    {
        $em= $this->getDoctrine()->getManager();
        $enfant=$em->getRepository('GererEnfantBundle:Enfant')->find($id);
        $em->remove($enfant);
        $em->flush();
        return $this->redirectToRoute('afficheEnfant');
    }
}