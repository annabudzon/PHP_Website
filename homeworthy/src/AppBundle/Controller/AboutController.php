<?php
/**
 * Created by PhpStorm.
 * User: Ania
 * Date: 2017-11-13
 * Time: 18:34
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("about")
 */
class AboutController extends Controller
{
    /**
     * @Route("/", name="about")
     */
    public function aboutAction(){

        return $this->render('my_page/about.html.twig');
    }

}