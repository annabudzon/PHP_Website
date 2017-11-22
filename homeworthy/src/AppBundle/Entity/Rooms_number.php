<?php
/**
 * Created by PhpStorm.
 * User: Ania
 * Date: 2017-10-15
 * Time: 22:45
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="number_of_rooms")
 */
class Rooms_number
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id_rooms_number;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $rooms_number;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Flat_rental", mappedBy="rooms_number", cascade={"all", "remove"})
     */
    private $flats_rental;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Flat_sale", mappedBy="rooms_number", cascade={"all", "remove"})
     */
    private $flats_sale;

    public function __construct()
    {
        $this->flats_rental = new ArrayCollection();
        $this->flats_sale = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getIdRoomsNumber()
    {
        return $this->id_rooms_number;
    }

    /**
     * @param mixed $id_rooms_number
     */
    public function setIdRoomsNumber($id_rooms_number)
    {
        $this->id_rooms_number = $id_rooms_number;
    }

    /**
     * @return mixed
     */
    public function getRoomsNumber()
    {
        return $this->rooms_number;
    }

    /**
     * @param mixed $rooms_number
     */
    public function setRoomsNumber($rooms_number)
    {
        $this->rooms_number = $rooms_number;
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

}