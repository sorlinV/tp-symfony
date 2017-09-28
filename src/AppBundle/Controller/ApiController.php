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
            $props = get_class_methods($obj);
            $tmp = [];
            foreach ($props as $prop) {
                if (substr($prop, 0, 3) === "get") {
                    $tmp[substr($prop, 3)] = $obj->$prop();
                    echo "tmp[".lcfirst(substr($prop, 3))."] = obj->".$prop . "()\n";
                }
            }
            $jsonobjs[] = $tmp;
        }
        return $jsonobjs;
    }
}