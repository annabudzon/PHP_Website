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
            'flats_rent' => $flatr,
        ));
    }


    /**
     * @Route("/{id}/confirm", name="confirm_delete_user")
     * @Method("GET")
     * @param integer $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function confirmDeleteAction($id){

        $user = $this->getUser();

        $deleteForm = $this->createDeleteForm($user);

        return $this->render('account/delete_confirm.html.twig', array(
            'user' => $user,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     *
     * Deletes a user entity.
     *
     * @Route("/delete/{id}", name="user_delete")
     * @Method({"DELETE"})
     * @param Request $request
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteUserAction(Request $request, User $user){

        $form = $this->createDeleteForm($user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush();
        }

        return $this->redirectToRoute('homepage');
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