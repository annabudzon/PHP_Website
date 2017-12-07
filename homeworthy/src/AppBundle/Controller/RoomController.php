<?php
/**
 * Created by PhpStorm.
 * User: Ania
 * Date: 2017-12-03
 * Time: 17:16
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Localization;
use AppBundle\Entity\Property_type;
use AppBundle\Entity\RoomRent;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
     * @param integer $id
     * @param boolean $status
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showRoomAction($id, $status = false){
        if($status == null){
            $status = false;
        }

        $room_rental = $this->getDoctrine()->getRepository(RoomRent::class)->find($id);

        return $this->render('room/show_room.html.twig', array(
            'room_rental' => $room_rental,
            'status' => $status
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

}