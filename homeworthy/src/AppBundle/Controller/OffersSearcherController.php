<?php
/**
 * Created by PhpStorm.
 * User: Ania
 * Date: 2017-11-13
 * Time: 18:20
 */

namespace AppBundle\Controller;

use AppBundle\Entity\FlatRent;
use AppBundle\Entity\FlatSale;
use AppBundle\Entity\Offer_type;
use AppBundle\Entity\OffersSearcher;
use AppBundle\Entity\RoomRent;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("search")
 */
class OffersSearcherController extends Controller
{

    /**
     * @Route("/", name="search")
     * @param Request $request
     * @Method({"GET", "POST"})
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function searchAction(Request $request)
    {
        $searcher = new OffersSearcher();

        $form = $this->createForm('AppBundle\Form\OffersSearcherType', $searcher);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($searcher);
            $em->flush();

            return $this->redirectToRoute('display_offers', array('id' => $searcher->getIdSearcher()));
        }

        return $this->render(
            'search/search.html.twig',
            array(
                'searcher' => $searcher,
                'form' => $form->createView(),
            )
        );
    }

    /**
     * @Route("/{id}/display", name="display_offers")
     * @param integer $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function displayAction($id)
    {
        $rooms = null;
        $flats = null;
        $flatr = null;

        $choice = $this->getDoctrine()->getRepository(OffersSearcher::class)->find($id);

        $room_repo = $this->getDoctrine()->getRepository(RoomRent::class);
        $flats_repo = $this->getDoctrine()->getRepository(FlatSale::class);
        $flatr_repo = $this->getDoctrine()->getRepository(FlatRent::class);


        $rooms = $room_repo->findOffersByChoices($choice);
        $flatr = $flatr_repo->findOffersByChoices($choice);
        $flats = $flats_repo->findOffersByChoices($choice);


        return $this->render('search/display.html.twig', array(
            'rooms_rent' => $rooms,
            'flats_sale' => $flats,
            'flats_rent' => $flatr
        ));

    }

}