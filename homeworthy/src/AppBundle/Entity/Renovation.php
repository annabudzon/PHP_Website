<?php
/**
 * Created by PhpStorm.
 * User: Ania
 * Date: 2017-10-15
 * Time: 22:47
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="renovation")
 */
class Renovation
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id_renovation;

    /**
     * @ORM\Column(type="boolean")
     */
    private $renovation;

    /**
     * @ORM\Column(type="date")
     */
    private $renovation_date;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Room_rental", mappedBy="renovation", cascade={"all", "remove"})
     */
    private $rooms_rental;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Flat_rental", mappedBy="renovation", cascade={"all", "remove"})
     */
    private $flats_rental;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Flat_sale", mappedBy="renovation", cascade={"all", "remove"})
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
    public function getIdRenovation()
    {
        return $this->id_renovation;
    }

    /**
     * @param mixed $id_renovation
     */
    public function setIdRenovation($id_renovation)
    {
        $this->id_renovation = $id_renovation;
    }

    /**
     * @return mixed
     */
    public function getRenovation()
    {
        return $this->renovation;
    }

    /**
     * @param mixed $renovation
     */
    public function setRenovation($renovation)
    {
        $this->renovation = $renovation;
    }

    /**
     * @return mixed
     */
    public function getRenovationDate()
    {
        return $this->renovation_date;
    }

    /**
     * @param mixed $renovation_date
     */
    public function setRenovationDate($renovation_date)
    {
        $this->renovation_date = $renovation_date;
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