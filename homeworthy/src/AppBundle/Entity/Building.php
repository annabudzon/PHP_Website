<?php
/**
 * Created by PhpStorm.
 * User: Ania
 * Date: 2017-10-21
 * Time: 23:17
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="building_type")
 */
class Building
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id_building;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $building_type;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Room_rental", mappedBy="building")
     */
    private $rooms_rental;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Flat_rental", mappedBy="building")
     */
    private $flats_rental;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Flat_sale", mappedBy="building")
     */
    private $flats_sale;

    public function __construct()
    {
        $this->rooms_rental = new ArrayCollection();
        $this->flats_rental = new ArrayCollection();
        $this->flats_sale = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getIdBuilding()
    {
        return $this->id_building;
    }

    /**
     * @param mixed $id_building
     */
    public function setIdBuilding($id_building)
    {
        $this->id_building = $id_building;
    }

    /**
     * @return mixed
     */
    public function getBuildingType()
    {
        return $this->building_type;
    }

    /**
     * @param mixed $building_type
     */
    public function setBuildingType($building_type)
    {
        $this->building_type = $building_type;
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

}