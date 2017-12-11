<?php
/**
 * Created by PhpStorm.
 * User: Ania
 * Date: 2017-12-09
 * Time: 16:53
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="offer_type")
 */
class Offer_type
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id_offer_type;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $offer;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\OffersSearcher", mappedBy="offer", cascade={"all", "remove"})
     */
    private $searcher;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\RoomRent", mappedBy="offer_type", cascade={"all", "remove"})
     */
    private $rooms_rental;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\FlatRent", mappedBy="offer_type", cascade={"all", "remove"})
     */
    private $flats_rental;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\FlatSale", mappedBy="offer_type", cascade={"all", "remove"})
     */
    private $flats_sale;

    public function __construct()
    {
        $this->rooms_rental = new ArrayCollection();
        $this->flats_rental = new ArrayCollection();
        $this->flats_sale = new ArrayCollection();
        $this->searcher = new ArrayCollection();
    }

    /**
     * @return integer
     */
    public function getIdOfferType()
    {
        return $this->id_offer_type;
    }

    /**
     * @param mixed $id_offer_type
     */
    public function setIdOfferType($id_offer_type)
    {
        $this->id_offer_type = $id_offer_type;
    }

    /**
     * @return mixed
     */
    public function getOffer()
    {
        return $this->offer;
    }

    /**
     * @param mixed $offer
     */
    public function setOffer($offer)
    {
        $this->offer = $offer;
    }

    /**
     * @return mixed
     */
    public function getRoomsRental()
    {
        return $this->rooms_rental;
    }

    /**
     * @param mixed $rooms_rental
     */
    public function setRoomsRental($rooms_rental)
    {
        $this->rooms_rental = $rooms_rental;
    }

    /**
     * @return mixed
     */
    public function getFlatsRental()
    {
        return $this->flats_rental;
    }

    /**
     * @param mixed $flats_rental
     */
    public function setFlatsRental($flats_rental)
    {
        $this->flats_rental = $flats_rental;
    }

    /**
     * @return mixed
     */
    public function getFlatsSale()
    {
        return $this->flats_sale;
    }

    /**
     * @param mixed $flats_sale
     */
    public function setFlatsSale($flats_sale)
    {
        $this->flats_sale = $flats_sale;
    }


    public function __toString()
    {
        return $this->offer;
    }

    /**
     * @return mixed
     */
    public function getSearcher()
    {
        return $this->searcher;
    }

    /**
     * @param mixed $searcher
     */
    public function setSearcher($searcher)
    {
        $this->searcher = $searcher;
    }


}