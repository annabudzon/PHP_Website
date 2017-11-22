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
 * @ORM\Table(name="localization")
 */
class Localization
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id_localization;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\City", inversedBy="localizations")
     * @ORM\JoinColumn(name="id_city", referencedColumnName="id_city")
     */
    private $city;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Country", inversedBy="localizations")
     * @ORM\JoinColumn(name="id_country", referencedColumnName="id_country")
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $district;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $street;

    /**
     * @ORM\Column(type="hyperlink", length=100)
     */
    //private $map;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Room_rental", mappedBy="localization", cascade={"all", "remove"})
     */
    private $rooms_rental;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Flat_rental", mappedBy="localization", cascade={"all", "remove"})
     */
    private $flats_rental;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Flat_sale", mappedBy="localization", cascade={"all", "remove"})
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
    public function getIdLocalization()
    {
        return $this->id_localization;
    }

    /**
     * @param mixed $id_localization
     */
    public function setIdLocalization($id_localization)
    {
        $this->id_localization = $id_localization;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * @param mixed $district
     */
    public function setDistrict($district)
    {
        $this->district = $district;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param mixed $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
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