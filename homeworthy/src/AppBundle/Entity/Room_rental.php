<?php
/**
 * Created by PhpStorm.
 * Owner: Ania
 * Date: 2017-10-15
 * Time: 21:56
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="room_rental")
 */
class Room_rental extends  Property_rental
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id_room;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Property_type", inversedBy="rooms_rental")
     * @ORM\JoinColumn(name="id_property_type", referencedColumnName="id_property_type")
     */
    private $property_type;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Owner_type", inversedBy="rooms_rental")
     * @ORM\JoinColumn(name="id_owner_type", referencedColumnName="id_owner_type")
     */
    private $owner_type;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Localization", inversedBy="rooms_rental")
     * @ORM\JoinColumn(name="id_localization", referencedColumnName="id_localization")
     */
    private $localization;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Renovation", inversedBy="rooms_rental")
     * @ORM\JoinColumn(name="id_renovation", referencedColumnName="id_renovation")
     */
    private $renovation;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Building", inversedBy="rooms_rental")
     * @ORM\JoinColumn(name="id_building", referencedColumnName="id_building")
     */
    private $building;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="rooms_rental")
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Tenants_number", inversedBy="rooms_rental")
     * @ORM\JoinColumn(name="id_tenants_number", referencedColumnName="id_tenants_number")
     */
    private $tenants_number;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Photo", mappedBy="room_rental", cascade={"all", "remove"})
     */
    private $room_photos;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Localization", mappedBy="city", cascade={"all", "remove"})
     */
    private $localizations;

    /**
     * @ORM\Column(type="boolean")
     */
    private $connecting;

    /**
     * @ORM\Column(type="boolean")
     */
    private $roommate;

    public function __construct()
    {
        $this->room_photos = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param mixed $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getAvailable()
    {
        return $this->available;
    }

    /**
     * @param mixed $available
     */
    public function setAvailable($available)
    {
        $this->available = $available;
    }

    /**
     * @return mixed
     */
    public function getRentPrice()
    {
        return $this->rent_price;
    }

    /**
     * @param mixed $rent_price
     */
    public function setRentPrice($rent_price)
    {
        $this->rent_price = $rent_price;
    }

    /**
     * @return mixed
     */
    public function getOwnerPrice()
    {
        return $this->owner_price;
    }

    /**
     * @param mixed $owner_price
     */
    public function setOwnerPrice($owner_price)
    {
        $this->owner_price = $owner_price;
    }

    /**
     * @return mixed
     */
    public function getMediaPrice()
    {
        return $this->media_price;
    }

    /**
     * @param mixed $media_price
     */
    public function setMediaPrice($media_price)
    {
        $this->media_price = $media_price;
    }

    /**
     * @return mixed
     */
    public function getAdvance()
    {
        return $this->advance;
    }

    /**
     * @param mixed $advance
     */
    public function setAdvance($advance)
    {
        $this->advance = $advance;
    }

    /**
     * @return mixed
     */
    public function getTotalPrice()
    {
        return $this->total_price;
    }

    /**
     * @param mixed $total_price
     */
    public function setTotalPrice($total_price)
    {
        $this->total_price = $total_price;
    }

    /**
     * @return mixed
     */
    public function getFloor()
    {
        return $this->floor;
    }

    /**
     * @param mixed $floor
     */
    public function setFloor($floor)
    {
        $this->floor = $floor;
    }

    /**
     * @return mixed
     */
    public function getFurnished()
    {
        return $this->furnished;
    }

    /**
     * @param mixed $furnished
     */
    public function setFurnished($furnished)
    {
        $this->furnished = $furnished;
    }

    /**
     * @return mixed
     */
    public function getBalcony()
    {
        return $this->balcony;
    }

    /**
     * @param mixed $balcony
     */
    public function setBalcony($balcony)
    {
        $this->balcony = $balcony;
    }

    /**
     * @return mixed
     */
    public function getSmoker()
    {
        return $this->smoker;
    }

    /**
     * @param mixed $smoker
     */
    public function setSmoker($smoker)
    {
        $this->smoker = $smoker;
    }

    /**
     * @return mixed
     */
    public function getPets()
    {
        return $this->pets;
    }

    /**
     * @param mixed $pets
     */
    public function setPets($pets)
    {
        $this->pets = $pets;
    }

    /**
     * @return mixed
     */
    public function getIdRoom()
    {
        return $this->id_room;
    }

    /**
     * @param mixed $id_room
     */
    public function setIdRoom($id_room)
    {
        $this->id_room = $id_room;
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
    public function getLocalization()
    {
        return $this->localization;
    }

    /**
     * @param mixed $localization
     */
    public function setLocalization($localization)
    {
        $this->localization = $localization;
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
    public function getBuilding()
    {
        return $this->building;
    }

    /**
     * @param mixed $building
     */
    public function setBuilding($building)
    {
        $this->building = $building;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getTenantsNumber()
    {
        return $this->tenants_number;
    }

    /**
     * @param mixed $tenants_number
     */
    public function setTenantsNumber($tenants_number)
    {
        $this->tenants_number = $tenants_number;
    }

    /**
     * @return mixed
     */
    public function getConnecting()
    {
        return $this->connecting;
    }

    /**
     * @param mixed $connecting
     */
    public function setConnecting($connecting)
    {
        $this->connecting = $connecting;
    }

    /**
     * @return mixed
     */
    public function getRoommate()
    {
        return $this->roommate;
    }

    /**
     * @param mixed $roommate
     */
    public function setRoommate($roommate)
    {
        $this->roommate = $roommate;
    }

    /**
     * @return mixed
     */
    public function getPlan()
    {
        return $this->plan;
    }

    /**
     * @param mixed $plan
     */
    public function setPlan($plan)
    {
        $this->plan = $plan;
    }

    /**
     * @return mixed
     */
    public function getLocalizations()
    {
        return $this->localizations;
    }

    /**
     * @param mixed $localizations
     */
    public function setLocalizations($localizations)
    {
        $this->localizations = $localizations;
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


}