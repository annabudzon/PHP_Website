<?php
/**
 * Created by PhpStorm.
 * User: Ania
 * Date: 2017-10-21
 * Time: 23:15
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="owner_type")
 */
class Owner_type
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id_owner_type;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $owner_type;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\RoomRent", mappedBy="owner_type", cascade={"all", "remove"})
     */
    private $rooms_rental;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\FlatRent", mappedBy="owner_type", cascade={"all", "remove"})
     */
    private $flats_rental;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\FlatSale", mappedBy="owner_type", cascade={"all", "remove"})
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
    public function getIdOwnerType()
    {
        return $this->id_owner_type;
    }

    /**
     * @param mixed $id_owner_type
     */
    public function setIdOwnerType($id_owner_type)
    {
        $this->id_owner_type = $id_owner_type;
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
    public function getOwners()
    {
        return $this->owners;
    }

    /**
     * @param mixed $owners
     */
    public function setOwners($owners)
    {
        $this->owners = $owners;
    }


    public function __toString()
    {
        return $this->owner_type;
    }

}