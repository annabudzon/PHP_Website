<?php
/**
 * Created by PhpStorm.
 * User: Ania
 * Date: 2017-11-13
 * Time: 18:20
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("signin")
 */
class SignInController extends Controller
{
    /**
     * @Route("/", name="signin")
     */
    public function signinAction(){

        return $this->render('signin/signin.html.twig');
    }
}