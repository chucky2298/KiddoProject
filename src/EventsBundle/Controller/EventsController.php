<?php

namespace EventsBundle\Controller;

use EventsBundle\Entity\Evenements;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use EventsBundle\Entity\Participations;
use EventsBundle\Form\EvenementsType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EventsController extends Controller
{
    public function ajoutEventAction(Request $request)
    {

        $event = new Evenements();
        $form = $this->createForm(EvenementsType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();
            return $this->redirectToRoute('afficher_event');
        }

        return $this->render('@Events/Events/ajout.html.twig', array('form' => $form->createView()));
    }
    public function afficherEventAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $events = $em->getRepository('EventsBundle:Evenements')->findAll();

        return $this->render('@Events/Events/affiche.html.twig', array(
            'events' => $events));


    }
    public function supprimerEventAction($id)
    {

        $em= $this->getDoctrine()->getManager();
        $event =$em->getRepository('EventsBundle:Evenements')->find($id);
        $em->remove($event);
        $em->flush();
        return $this->redirectToRoute('afficher_event');


    }
    public function modifierEventAction(Request $request,$id)
    {

        $em=$this->getDoctrine()->getManager();
        $event= $em->getRepository('EventsBundle:Evenements')->find($id);
        $form=$this->createForm(EvenementsType::class,$event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();
            return $this->redirectToRoute('afficher_event');
        }


        return $this->render('@Events/Events/modifier.html.twig', array('form' => $form->createView()));




    }

}
//mayhebech yaffichi template fel fonction hedhi
//badel fel json, create bundle yml, create controller yml, create database, create entity annotation, schema create