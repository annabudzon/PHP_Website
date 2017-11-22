<?php
/**
 * Created by PhpStorm.
 * Owner: Ania
 * Date: 2017-10-14
 * Time: 12:10
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    /**
     * @Route("/", name = "homepage")
     */
    public function homeAction(){

        return $this->render('default/index.html.twig');
    }
}

