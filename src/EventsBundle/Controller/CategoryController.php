<?php

namespace EventsBundle\Controller;

use EventsBundle\Entity\Category;
use EventsBundle\Form\CategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CategoryController extends Controller
{
    public function ajouterCategoryAction(Request $request)
    {

        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();
            return $this->redirectToRoute('afficher_category');
        }

        return $this->render('@Events/Category/ajouter.html.twig', array('form' => $form->createView()));
    }
    public function afficherCategoryAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository('EventsBundle:Category')->findAll();

        return $this->render('@Events/Category/afficher.html.twig', array(
            'category' => $category));


    }
    public function supprimerCategoryAction($id)
    {

        $em= $this->getDoctrine()->getManager();
        $category =$em->getRepository('EventsBundle:Category')->find($id);
        $em->remove($category);
        $em->flush();
        return $this->redirectToRoute('afficher_category');


    }
}
