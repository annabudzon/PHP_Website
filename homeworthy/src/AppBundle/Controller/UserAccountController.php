<?php
/**
 * Created by PhpStorm.
 * User: Ania
 * Date: 2017-11-18
 * Time: 21:02
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
/**
 * @Route("user_account")
 */
class UserAccountController extends Controller
{
    /**
     * @Route("/", name="user_account")
     *
     */
    public function accountAction(){

        return $this->render('account/user_account.html.twig');
    }
}