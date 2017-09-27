<?php
namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Cat;
use AppBundle\Form\CatType;

class ApiController extends Controller
{
    /**
    * @Route("/json/cats", name="json_cats")
    */
    public function listAllCat()
    {
        $cats = $this->getDoctrine()
            ->getRepository(Cat::class)
            ->findAll();
        return new JsonResponse($this->to_jsonify($cats));
    }

    private function to_jsonify($objs) {
        $jsonobjs = [];
        foreach($objs as $obj) {
            $tmp = [];
            var_dump($obj);
            foreach ($obj as $key=>$value) {
                var_dump($obj[$key]);
                $tmp[$key] = $value;
            }
            $jsonobjs[] = $tmp;
        }
        return $jsonobjs;
    }
}