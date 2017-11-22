<?php
/**
 * Created by PhpStorm.
 * User: Ania
 * Date: 2017-10-15
 * Time: 22:46
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="property_type")
 */
class Property_type
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id_property_type;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $property;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Room_rental", mappedBy="property_type", cascade={"all", "remove"})
     */
    private $rooms_rental;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Flat_rental", mappedBy="property_type", cascade={"all", "remove"})
     */
    private $flats_rental;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Flat_sale", mappedBy="property_type", cascade={"all", "remove"})
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
    public function getIdPropertyType()
    {
        return $this->id_property_type;
    }

    /**
     * @param mixed $id_property_type
     */
    public function setIdPropertyType($id_property_type)
    {
        $this->id_property_type = $id_property_type;
    }

    /**
     * @return mixed
     */
    public function getPropertyType()
    {
        return $this->property_type;
    }

    /**
     * @param mixed $property_type
     */
    public function setPropertyType($property_type)
    {
        $this->property_type = $property_type;
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