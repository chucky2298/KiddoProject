<?php

namespace GererEnfantBundle\Controller;
use GererEnfantBundle\Form\AbstractType;
use GererEnfantBundle\Entity\Note;
use GererEnfantBundle\Form\NoteType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use symfony\Component\HttpFoundation\Request;
class NoteController extends Controller
{
   public function ajoutNoteAction(Request $request)
    {
      $note = new note;
        $form = $this->createForm(NoteType::class, $note);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($note);
            $em->flush();
        }
        return $this->render("@GererEnfant/Note/addNote.html.twig", array('form' => $form->createView()));
    }

    public function afficheNoteAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $note = $em->getRepository("GererEnfantBundle:Note")->findAll();
        return $this->render("@GererNote/Note/afficheNote.html.twig", array('Note' => $note));

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

    public function deleteNotetAction(Request $request, $id)
    {
        $em= $this->getDoctrine()->getManager();
        $note=$em->getRepository('GererEnfantBundle')->find($id);
        $em->remove($note);
        $em->flush();
        return $this->redirectToRoute('afficheNote');
    }


}
