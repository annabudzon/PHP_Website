<?php
/**
 * Created by PhpStorm.
 * User: Ania
 * Date: 2017-12-03
 * Time: 17:16
 */

namespace AppBundle\Controller;

use AppBundle\Entity\FlatSale;
use AppBundle\Entity\Localization;
use AppBundle\Entity\Offer_type;
use AppBundle\Entity\Property_type;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Ivory\GoogleMap\Map;
/**
 * @Route("flat_sale")
 */
class FlatSaleController extends Controller
{

    /**
     * @Route("/add", name="add_flat_sale")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newFlatSaleAction(Request $request){

        $localization = new Localization();
        $flat_sale = new FlatSale();
        $flat_sale->setUser($this->getUser());
        $flat_sale->setLocalization($localization);
        $flat_sale->setPropertyType($this->getDoctrine()->getRepository(Property_type::class)->find(1));
        $flat_sale->setOfferType($this->getDoctrine()->getRepository(Offer_type::class)->find(1));
        $flat_sale->prePersist();
        $form = $this->createForm('AppBundle\Form\FlatSaleType', $flat_sale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($flat_sale);
            $em->persist($localization);
            $em->flush();

            return $this->redirectToRoute('show_flat_sale', array('id' => $flat_sale->getIdFlat()));
        }

        return $this->render('flat_sale/add_fsale.html.twig', array(
            'flat_rental' => $flat_sale,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/{id}", name="show_flat_sale")
     * @Method("GET")
     *
     * @param Request $request
     * @param integer $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showFlatRentAction(Request $request, $id){

        $last_route = $request->headers->get('referer');

        $flat_sale = $this->getDoctrine()->getRepository(FlatSale::class)->find($id);

        return $this->render('flat_sale/show_fsale.html.twig', array(
            'flat_sale' => $flat_sale,
            'user' =>$this->getUser(),
            'last_route' => $last_route
        ));
     }

    /**
     * @Route("/{id}/confirm", name="confirm_delete_flat_sale")
     * @Method("GET")
     * @param integer $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function confirmDeleteAction($id){
        $flat_sale = $this->getDoctrine()->getRepository(FlatSale::class)->find($id);

        $deleteForm = $this->createDeleteForm($flat_sale);

        return $this->render('flat_sale/confirm.html.twig', array(
            'flat_sale' => $flat_sale,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * @Route("/{id}/edit", name="edit_flat_sale")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @param FlatSale $flat_sale
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, FlatSale $flat_sale)
    {
        $editForm = $this->createForm('AppBundle\Form\FlatSaleType', $flat_sale);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('show_flat_sale', array('id' => $flat_sale->getIdFlat()));
        }

        return $this->render('flat_sale/edit_fsale.html.twig', array(
            'flat_sale' => $flat_sale,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Deletes a flat_rent entity.
     *
     * @Route("/{id}/delete", name="delete_flat_sale")
     * @Method("DELETE")
     * @param Request $request
     * @param FlatSale $flat_sale
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction(Request $request, FlatSale $flat_sale)
    {
        $form = $this->createDeleteForm($flat_sale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($flat_sale);
            $em->flush();
        }

        return $this->redirectToRoute('offers');
    }

    /**
     * Creates a form to delete a flat_rent entity.
     *
     * @param FlatSale $flat_sale
     *
     * @return \Symfony\Component\Form\FormInterface
     */
    private function createDeleteForm(FlatSale $flat_sale)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('delete_flat_sale', array('id' => $flat_sale->getIdFlat())))
            ->setMethod('DELETE')
            ->getForm();
    }
}

