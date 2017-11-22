<?php
/**
 * Created by PhpStorm.
 * User: Ania
 * Date: 2017-11-13
 * Time: 18:19
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * @Route("signup")
 */
class SignUpController extends Controller
{
    /**
     * @Route("/", name="signup")
     *
     */
    public function signupAction(){

        return $this->render('signup/signup.html.twig');
    }
}