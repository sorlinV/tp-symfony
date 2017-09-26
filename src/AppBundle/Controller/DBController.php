<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Cat;
use Symfony\Component\HttpFoundation\Response;

class DBController extends Controller
{
    
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

     /**
     * @Route("/cat/add", name="add_cat")
     */
     public function addCat()
     {
        $em = $this->getDoctrine()->getManager();
        $cat = new cat();
        $cat->setName('Keyboard Cat');
        $cat->setColor('BLUE');
        $cat->setAge(10);
        $cat->setMaster('me');
        $cat->setMouseKilled(2039);
        $em->persist($cat);
        $em->flush();
        return new Response(
            'cat ajouté'
        );
     }

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
     * @Route("/cat/del/{id}", name="affcat")
     */
     public function delCat($id)
     {
        $em = $this->getDoctrine()->getManager();
        $cat = $this->getDoctrine()
        ->getRepository(Cat::class)
        ->find($id);
        if (isset($cat) && $cat !== NULL){
            $em->remove($cat);
            $em->flush();
            return new Response("chat supprimé");
        } else {
            return new Response("chat non supprimé, il n'existe pas");
        }
     }
 }