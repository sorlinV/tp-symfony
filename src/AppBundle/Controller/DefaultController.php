<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    // [...]
    
    /**
     * @Route("/lucky/number/{min}/{max}", name="lucky_number", requirements={"min": "\d+", "min", "\d+"})
     */
    public function numberAction($min, $max)
    {
        if ($min <= $max) {
            $number = mt_rand($min, $max);
            //ici on va chercher le template et on lui transmet la variable
            return $this->render('AppBundle:Default:number.html.twig', array(
                // pour fournir des variables au template
                // a gauche, le nom qui sera utilisé dans le template
                // a droite, la valeur
                'number' => $number
            ));    
        } else {
            return new Response(
                'la valeur min doit être inferieur a la valeur max'
            );
        }
    }
}