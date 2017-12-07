<?php
/**
 * Created by PhpStorm.
 * Owner: Ania
 * Date: 2017-10-15
 * Time: 21:57
 */

namespace AppBundle\Entity;

use AppBundle\Entity\FlatRent;
use AppBundle\Entity\FlatSale;
use AppBundle\Entity\RoomRent;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * @ORM\Entity
 * @ORM\Table(name="`user`")
 * @ORM\HasLifecycleCallbacks
 */
class User extends BaseUser
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $phone_nr;

    /**
     * @ORM\Column(type="datetime")
     */
    private $registration_date;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\RoomRent", mappedBy="user", cascade={"all", "remove"})
     */
    private $rooms_rental;

   /**
    * @ORM\OneToMany(targetEntity="AppBundle\Entity\FlatRent", mappedBy="user", cascade={"all", "remove"})
    */
   private $flats_rental;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\FlatSale", mappedBy="user", cascade={"all", "remove"})
     */
    private $flats_sale;

    public function __construct()
    {
        parent::__construct();
        $this->rooms_rental = new ArrayCollection();
        $this->flats_rental = new ArrayCollection();
        $this->flats_sale = new ArrayCollection();
        $this->roles = array('ROLE_USER');
    }

    /**
     * @ORM\PrePersist()
     *
     */

    public function prePersist()
    {
        $this->registration_date = new \DateTime;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPhone_Nr()
    {
        return $this->phone_nr;
    }

    /**
     * @param mixed $phone_nr
     */
    public function setPhone_Nr($phone_nr)
    {
        $this->phone_nr = $phone_nr;
    }

    /**
     * @return mixed
     */
    public function getPhoneNr()
    {
        return $this->phone_nr;
    }

    /**
     * @param mixed $phone_nr
     */
    public function setPhoneNr($phone_nr)
    {
        $this->phone_nr = $phone_nr;
    }

    /**
     * @return mixed
     */
    public function getRegistration_Date()
    {
        return $this->registration_date;
    }

    /**
     * @param mixed $registration_date
     */
    public function setRegistration_Date($registration_date)
    {
        $this->registration_date = $registration_date;
    }

    /**
     * @return \DateTime
     */
    public function getLast_Login()
    {
        return $this->lastLogin;
    }


    /**
     * Get Room_rentals
     *
     * @return \Doctrine\Common\Collections\Collection
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
     * Get Flat_rentals
     *
     * @return \Doctrine\Common\Collections\Collection
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
     * Get Flat_sales
     *
     * @return \Doctrine\Common\Collections\Collection
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


    /**
     * Add room_rental
     *
     * @param RoomRent $room_rental
     *
     * @return User
     */
    public function addRoomRental(RoomRent $room_rental)
    {
        $this->rooms_rental[] = $room_rental;

        return $this;
    }

    /**
     * Remove room_rental
     *
     * @param RoomRent $room_rental
     */
    public function removeRoomRental(RoomRent $room_rental)
    {
        $this->rooms_rental->removeElement($room_rental);
    }

    /**
     * Add room_rental
     *
     * @param FlatRent $flat_rental
     *
     * @return User
     */
    public function addFlatRental(FlatRent $flat_rental)
    {
        $this->flats_rental[] = $flat_rental;

        return $this;
    }

    /**
     * Remove Room_rent
     *
     * @param FlatRent $flat_rental
     */
    public function removeFlatRental(FlatRent $flat_rental)
    {
        $this->flats_rental->removeElement($flat_rental);
    }

    /**
     * Add room_rental
     *
     * @param FlatSale $flat_sale
     *
     * @return User
     */
    public function addFlatSale(FlatSale $flat_sale)
    {
        $this->flats_sale[] = $flat_sale;

        return $this;
    }

    /**
     * Remove Room_rent
     *
     * @param FlatSale $flat_sale
     */
    public function removeFlatSale(FlatSale $flat_sale)
    {
        $this->flats_sale->removeElement($flat_sale);
    }

    public function __toString()
    {
        return $this->username." (email: ".$this->email.")";
    }



}