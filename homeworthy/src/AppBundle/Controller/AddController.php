<?php
/**
 * Created by PhpStorm.
 * User: Ania
 * Date: 2017-11-13
 * Time: 18:13
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("add")
 */
class AddController extends Controller
{
    /**
     * @Route("/", name="add")
     */
    public function addAction(){

        return $this->render('add/add.html.twig');
    }
}