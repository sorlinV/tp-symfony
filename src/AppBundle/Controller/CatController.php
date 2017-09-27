<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Cat;
use AppBundle\Form\CatType;

class CatController extends Controller
{
    /*=============================================================
    *==============================================================
    *=========================== AJOUT ============================
    *======================== du/des Chat =========================
    *==============================================================
    *============================================================*/
    
    /**
    * @Route("/cat/add", name="add_cat")
    */
    public function addCat(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(CatType::class)
        ->add('Submit', SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($form->getData());
            $em->flush();
            $task = $form->getData();
            return $this->redirectToRoute('cats');
        }
        return $this->render('AppBundle::form.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    /*=============================================================
    *==============================================================
    *========================== Edition ===========================
    *======================== du/des Chat =========================
    *==============================================================
    *============================================================*/
    
    /**
    * @Route("/cat/edit/{id}", name="edit_cat")
    */
    public function editCat(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $cat = $em->getRepository(Cat::class)->find($id);    
        $form = $this->createForm(CatType::class, $cat)
        ->add('Edit', SubmitType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($cat);
            $em->flush();
            $task = $form->getData();
            return $this->redirectToRoute('cats');
        }
        return $this->render('AppBundle::form.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    /*=============================================================
    *==============================================================
    *======================== Suppresion ==========================
    *======================== du/des Chat =========================
    *==============================================================
    *============================================================*/
    
    /**
    * @Route("/cat/del/{id}", name="del_cat")
    */
    public function delCat(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $cat = $this->getDoctrine()
        ->getRepository(Cat::class)
        ->find($id);
        $form = $this->createDeleteForm($cat);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            return $this->redirectToRoute('cats');
        }
        return $this->render('AppBundle::form.html.twig', array(
            'form' => $form->createView()
        ));
}

     /**
     * Crée un formulaire pour supprimer un Article
     */
     private function createDeleteForm(Cat $cat)
     {
         //on crée un formulaire
         return $this->createFormBuilder()
             ->setAction($this->generateUrl('del_cat', array('id' => $cat->getId())))
             ->setMethod('DELETE')
             ->add('delete', SubmitType::class)
             ->getForm()
         ;
     }
    /*=============================================================
    *==============================================================
    *========================= Affichage ==========================
    *======================== du/des Chat =========================
    *==============================================================
    *============================================================*/

     /**
     * @Route("/cat/{id}", name="affcat")
     */
     public function affCat($id)
     {
        $em = $this->getDoctrine()->getManager();
        $cat = $this->getDoctrine()
        ->getRepository(Cat::class)
        ->find($id);
        if (!isset($cat) || $cat === NULL) {
            return new Response('Invalid Id');
        } else {
            return $this->render('AppBundle::cat.html.twig', array(
                'cat' => $cat
            ));
        }
     }

    /**
     * @Route("/cats", name="cats")
     */
     public function listAllCat()
     {
         $cats = $this->getDoctrine()
         ->getRepository(Cat::class)
         ->findAll();
         return $this->render('AppBundle::cats.html.twig', array(
             'cats' => $cats
         ));
     }

 }