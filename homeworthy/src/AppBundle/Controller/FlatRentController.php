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
use AppBundle\Entity\Offer_type;
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
        $flat_rental->setOfferType($this->getDoctrine()->getRepository(Offer_type::class)->find(2));
        $form = $this->createForm('AppBundle\Form\FlatRentType', $flat_rental);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($flat_rental);
            $em->persist($localization);
            $em->flush();

            return $this->redirectToRoute('show_flat_rent', array('id' => $flat_rental->getIdFlat()));
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
     * @param Request $request
     * @param integer $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @internal param bool $status
     */
    public function showFlatRentAction(Request $request, $id){
        $last_route = $request->headers->get('referer');

        $flat_rent = $this->getDoctrine()->getRepository(FlatRent::class)->find($id);

        return $this->render('flat_rent/show_frent.html.twig', array(
            'flat_rent' => $flat_rent,
            'user' =>$this->getUser(),
            'last_route' => $last_route,
        ));
    }

    /**
     * @Route("/{id}/confirm", name="confirm_delete_flat_rent")
     * @Method("GET")
     * @param integer $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function confirmDeleteAction($id){
        $flat_rent = $this->getDoctrine()->getRepository(FlatRent::class)->find($id);

        $deleteForm = $this->createDeleteForm($flat_rent);

        return $this->render('flat_rent/confirm.html.twig', array(
            'flat_rent' => $flat_rent,
            'delete_form' => $deleteForm->createView(),
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

    /**
     * Deletes a project entity.
     *
     * @Route("/{id}/delete", name="delete_flat_rent")
     * @Method("DELETE")
     * @param Request $request
     * @param FlatRent $flat_rent
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction(Request $request, FlatRent $flat_rent)
    {
        $form = $this->createDeleteForm($flat_rent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($flat_rent);
            $em->flush();
        }

        return $this->redirectToRoute('offers');
    }

    /**
     * Creates a form to delete a project entity.
     *
     * @param FlatRent $flat_rent
     *
     * @return \Symfony\Component\Form\FormInterface
     */
    private function createDeleteForm(FlatRent $flat_rent)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('delete_flat_rent', array('id' => $flat_rent->getIdFlat())))
            ->setMethod('DELETE')
            ->getForm();
    }

}