<?php
/**
 * Created by PhpStorm.
 * User: Ania
 * Date: 2017-12-03
 * Time: 17:16
 */

namespace AppBundle\Controller;

use AppBundle\Entity\FlatRent;
use AppBundle\Entity\Localization;
use AppBundle\Entity\Property_type;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("flat_rent")
 */
class FlatRentController extends Controller
{

    /**
     * @Route("/add", name="add_flat_rent")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newFlatRentAction(Request $request){

        $localization = new Localization();
        $flat_rental = new FlatRent();
        $flat_rental->setUser($this->getUser());
        $flat_rental->setLocalization($localization);
        $flat_rental->prePersist();
        $flat_rental->setPropertyType($this->getDoctrine()->getRepository(Property_type::class)->find(1));
        $form = $this->createForm('AppBundle\Form\FlatRentType', $flat_rental);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($flat_rental);
            $em->persist($localization);
            $em->flush();

            return $this->redirectToRoute('show_flat_rent', array('id' => $flat_rental->getIdFlat(), 'status' => true));
        }

        return $this->render('flat_rent/add_frent.html.twig', array(
            'flat_rental' => $flat_rental,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/added/{id}", name="added_flat_rent")
     * @Method("GET")
     */
    public function addedFlatRentAction(){

        return $this->render('add/add_completed.html.twig');
    }

    /**
     * @Route("/{id}", name="show_flat_rent")
     * @Method("GET")
     *
     * @param integer $id
     * @param boolean $status
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showFlatRentAction($id, $status = false){
        if($status == null){
            $status = false;
        }

        $flat_rent = $this->getDoctrine()->getRepository(FlatRent::class)->find($id);

        return $this->render('flat_rent/show_frent.html.twig', array(
            'flat_rent' => $flat_rent,
            'status' => $status
        ));
    }

    /**
     * @Route("/{id}/edit", name="edit_flat_rent")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @param FlatRent $flat_rent
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, FlatRent $flat_rent)
    {
        $editForm = $this->createForm('AppBundle\Form\FlatRentType', $flat_rent);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('show_flat_rent', array('id' => $flat_rent->getIdFlat()));
        }

        return $this->render('flat_rent/edit_frent.html.twig', array(
            'flat_rent' => $flat_rent,
            'edit_form' => $editForm->createView(),
        ));
    }

}