<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller
{
    // [...]
    
    /**
     * @Route("/blog/{year}/{title}",
     *     defaults={"_locale": "en"}, requirements={
     *         "year": "\d{4}",
     *         "title": "^[a-zA-Z0-9-]+$",
     *         "_locale": "en|fr|ru"
     *     })
     */
    public function numberAction($_locale, $year, $title)
    {
        if ($_locale == 'fr') {
            return new Response("Voici l'article $title, de l'année $year, en langue $_locale");
        } else if ($_locale == 'en') {
            return new Response("there is the article $title, from year $year, in $_locale");
        } else if ($_locale == 'ru') {
            return new Response("Cyka Blyat!");            
        }
    }
}