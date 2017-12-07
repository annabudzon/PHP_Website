<?php
/**
 * Created by PhpStorm.
 * User: Ania
 * Date: 2017-11-27
 * Time: 18:47
 */

namespace AppBundle\Controller;

use AppBundle\Entity\FlatRent;
use AppBundle\Entity\FlatSale;
use AppBundle\Entity\RoomRent;
use AppBundle\Entity\User;
use FOS\UserBundle\Doctrine\UserManager;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
/**
 * @Route("profile")
 */
class UserProfileController extends Controller
{
    /**
     * @Route("/offers", name="offers")
     *
     */
    public function viewOffersAction(){
        $room_repo = $this->getDoctrine()->getRepository(RoomRent::class);
        $flats_repo = $this->getDoctrine()->getRepository(FlatSale::class);
        $flatr_repo = $this->getDoctrine()->getRepository(FlatRent::class);

        $rooms = $room_repo->findOffersByUser($this->getUser()->getId());
        $flats = $flats_repo->findOffersByUser($this->getUser()->getId());
        $flatr = $flatr_repo->findOffersByUser($this->getUser()->getId());

        return $this->render('account/offers.html.twig', array(
            'rooms_rent' => $rooms,
            'flats_sale' => $flats,
            'flats_rent' => $flatr
        ));
    }

    /**
     *
     * Deletes a user entity.
     *
     * @Route("/delete/{id}", name="user_delete")
     * @Method({"DELETE"})
     * @param Request $request
     * @param integer $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteUserAction(Request $request, $id){

        $response = array(
            'success' => true,
            'message' => '',
            'html' => ''
        );

        $userManager = $this->get('fos_user.user_manager');
        /* @var $userManager UserManager */


        $user= $this->getUser();
        $username = $user->getUsername();

        $user = $userManager->findUserByUsername($username);
        if(\is_null($user)) {
            $response['success'] = false;
            $response['message'] = 'Sorry, user not found!';
        }

        \assert(!\is_null($user));
        $userManager->deleteUser($user);


        return $this->render('account/delete_confirm.html.twig', array(
            'user' => $user,
            'response' => $response
        ));
    }

    /**
     * Creates a form to delete a user entity.
     *
     * @param User $user The user entity
     *
     * @return \Symfony\Component\Form\FormInterface
     */
    private function createDeleteForm(User $user)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_delete', array('id' => $user->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

}