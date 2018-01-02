<?php
/**
 * Created by PhpStorm.
 * User: Ania
 * Date: 2017-12-15
 * Time: 13:48
 */

namespace AppBundle\Controller;

use AppBundle\Entity\FlatRent;
use AppBundle\Entity\FlatSale;
use AppBundle\Entity\RoomRent;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * @Route("admin_offers")
 */
class AdminViewController extends Controller
{

    /**
     * @Route("/", name="manage_offers")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewOffersAction(Request $request){

        $last_route = $request->headers->get('referer');

        $rooms = $this->getDoctrine()->getRepository(RoomRent::class)->findAll();
        $flats = $this->getDoctrine()->getRepository(FlatSale::class)->findAll();
        $flatr = $this->getDoctrine()->getRepository(FlatRent::class)->findAll();

        return $this->render('admin/admin.html.twig', array(
            'rooms_rent' => $rooms,
            'flats_sale' => $flats,
            'flats_rent' => $flatr,
            'last_route' => $last_route
        ));
    }

}