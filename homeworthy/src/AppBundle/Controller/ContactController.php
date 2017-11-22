<?php
/**
 * Created by PhpStorm.
 * User: Ania
 * Date: 2017-11-13
 * Time: 18:35
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("contact")
 */
class ContactController extends Controller
{
    /**
     * @Route("/", name="contact")
     */
    public function contactAction(){

        return $this->render('my_page/contact.html.twig');
    }
}