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
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FlatRentRepository")
 * @ORM\Table(name="flat_rental")
 */
class FlatRent extends  Property_rental
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id_flat;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Property_type", inversedBy="flats_rental")
     * @ORM\JoinColumn(name="id_property_type", referencedColumnName="id_property_type")
     */
    private $property_type;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Owner_type", inversedBy="flats_rental")
     * @ORM\JoinColumn(name="id_owner_type", referencedColumnName="id_owner_type")
     */
    private $owner_type;

    /**
     * @Assert\Type(type="AppBundle\Entity\Localization")
     * @Assert\Valid()
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Localization", inversedBy="flats_rental")
     * @ORM\JoinColumn(name="id_localization", referencedColumnName="id_localization")
     */
    private $localization;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Building", inversedBy="flats_rental")
     * @ORM\JoinColumn(name="id_building", referencedColumnName="id_building")
     */
    private $building;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="flats_rental")
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id", nullable=false)
    */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Rooms_number", inversedBy="flats_rental")
     * @ORM\JoinColumn(name="id_rooms_number", referencedColumnName="id_rooms_number")
     */
    private $rooms_number;

    /**
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Photo", mappedBy="flat_rental", cascade={"all", "remove"})
     */
    private $flat_photos;

    /**
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Photo", mappedBy="flat_rental", cascade={"all", "remove"})
     */
    private $plan;

    /**
     * @ORM\Column(type="boolean")
     */
    private $children;

    /**
     * @ORM\Column(type="boolean")
     */
    private $flatmate;

    public function __construct()
    {
        $this->flat_photos = new ArrayCollection();
        $this->plan = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getIdFlat()
    {
        return $this->id_flat;
    }

    /**
     * @param mixed $id_flat
     */
    public function setIdFlat($id_flat)
    {
        $this->id_flat = $id_flat;
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
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param mixed $children
     */
    public function setChildren($children)
    {
        $this->children = $children;
    }

    /**
     * @return mixed
     */
    public function getFlatmate()
    {
        return $this->flatmate;
    }

    /**
     * @param mixed $flatmate
     */
    public function setFlatmate($flatmate)
    {
        $this->flatmate = $flatmate;
    }

    /**
     * @return string
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
     * @ORM\PrePersist()
     *
     */

    public function prePersist()
    {
        $this->date = new \DateTime;
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
    public function getFlatPhotos()
    {
        return $this->flat_photos;
    }

    /**
     * @param mixed $flat_photos
     */
    public function setFlatPhotos($flat_photos)
    {
        $this->flat_photos = $flat_photos;
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
     * @return integer
     */
    public function getUserId()
    {
        return $this->getUserId();
    }

}