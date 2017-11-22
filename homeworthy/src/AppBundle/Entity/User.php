<?php
/**
 * Created by PhpStorm.
 * Owner: Ania
 * Date: 2017-10-15
 * Time: 21:57
 */

namespace AppBundle\Entity;

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
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Room_rental", mappedBy="user", cascade={"all", "remove"})
     */
    private $rooms_rental;

   /**
    * @ORM\OneToMany(targetEntity="AppBundle\Entity\Flat_rental", mappedBy="user", cascade={"all", "remove"})
    */
   private $flats_rental;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Flat_sale", mappedBy="user", cascade={"all", "remove"})
     */
    private $flats_sale;

    public function __construct()
    {
        parent::__construct();
        $this->rooms_rental = new ArrayCollection();
        $this->flats_rental = new ArrayCollection();
        $this->flats_sale = new ArrayCollection();
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
     * @return mixed
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
    public function getRegistrationDate()
    {
        return $this->registration_date;
    }

    /**
     * @param mixed $registration_date
     */
    public function setRegistrationDate($registration_date)
    {
        $this->registration_date = $registration_date;
    }

    /**
     * @return mixed
     */
    public function getOwnerType()
    {
        return $this->owner_type;
    }

    /**
     * @param mixed $owner_type
     */
    public function setOwnerType($owner_type)
    {
        $this->owner_type = $owner_type;
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