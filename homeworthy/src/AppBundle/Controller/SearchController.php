<?php
/**
 * Created by PhpStorm.
 * User: Ania
 * Date: 2017-11-13
 * Time: 18:20
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("search")
 */
class SearchController extends Controller
{
    /**
     * @Route("/", name="search")
     */
    public function searchAction(){

        $cities = array(
            "Kraków",
            "Warszawa",
            "Rzeszów",
            "Gdańsk",
            "Wrocław",
            "Lublin"
        );

        $types_of_property = array(
            "Mieszkanie",
            "Pokój"
        );

        $types_of_offer = array(
            "Sprzedaż",
            "Wynajem"
        );

        return $this->render('search/search.html.twig',
            array(
                'cities' => $cities,
                'types_of_property' => $types_of_property,
                'types_of_offer' =>  $types_of_offer ));
    }
}