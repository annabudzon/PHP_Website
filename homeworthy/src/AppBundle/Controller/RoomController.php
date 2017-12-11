<?php
/**
 * Created by PhpStorm.
 * User: Ania
 * Date: 2017-12-03
 * Time: 17:16
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Localization;
use AppBundle\Entity\Offer_type;
use AppBundle\Entity\Property_type;
use AppBundle\Entity\RoomRent;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Ivory\GoogleMap\Map;

/**
 * @Route("room")
 */
class RoomController extends Controller
{
    /**
     * @Route("/add", name="add_room")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newRoomAction(Request $request){

        $localization = new Localization();
        $room_rental = new RoomRent();
        $room_rental->setUser($this->getUser());
        $room_rental->setLocalization($localization);
        $room_rental->prePersist();
        $room_rental->setPropertyType($this->getDoctrine()->getRepository(Property_type::class)->find(2));
        $room_rental->setOfferType($this->getDoctrine()->getRepository(Offer_type::class)->find(2));
        $form = $this->createForm('AppBundle\Form\RoomRentType', $room_rental);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($room_rental);
            $em->persist($localization);
            $em->flush();

            return $this->redirectToRoute('show_room', array('id' => $room_rental->getIdRoom()));
        }

        return $this->render('room/add_room.html.twig', array(
            'room_rental' => $room_rental,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/added/{id}", name="added_room")
     * @Method("GET")
     */
    public function addedRoomAction(){

        return $this->render('add/add_completed.html.twig');
    }


    /**
     * @Route("/{id}", name="show_room")
     * @Method("GET")
     * @param Request $request
     * @param integer $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showRoomAction(Request $request, $id){

        $last_route = $request->headers->get('referer');

        $room_rental = $this->getDoctrine()->getRepository(RoomRent::class)->find($id);

        return $this->render('room/show_room.html.twig', array(
            'room_rental' => $room_rental,
            'user' =>$this->getUser(),
            'last_route' => $last_route
        ));
    }

    /**
     * @Route("/{id}/confirm", name="confirm_delete_room")
     * @Method("GET")
     * @param integer $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function confirmDeleteAction($id){
        $room_rental = $this->getDoctrine()->getRepository(RoomRent::class)->find($id);

        $deleteForm = $this->createDeleteForm($room_rental);

        return $this->render('room/confirm.html.twig', array(
            'room' => $room_rental,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * @Route("/{id}/edit", name="edit_room")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @param RoomRent $room_rental
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editRoomAction(Request $request, RoomRent $room_rental)
    {

        $editForm = $this->createForm('AppBundle\Form\RoomRentType', $room_rental);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('show_room', array('id' => $room_rental->getIdRoom()));
        }

        return $this->render('room/edit_room.html.twig', array(
            'room_rental' => $room_rental,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Deletes a flat_rent entity.
     *
     * @Route("/{id}/delete", name="delete_room")
     * @Method("DELETE")
     * @param Request $request
     * @param RoomRent $room
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction(Request $request, RoomRent $room)
    {
        $form = $this->createDeleteForm($room);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($room);
            $em->flush();
        }

        return $this->redirectToRoute('confirm_delete');
    }

    /**
     * Creates a form to delete a flat_rent entity.
     *
     * @param RoomRent $room
     *
     * @return \Symfony\Component\Form\FormInterface
     */
    private function createDeleteForm(RoomRent $room)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('delete_room', array('id' => $room->getIdRoom())))
            ->setMethod('DELETE')
            ->getForm();
    }

}