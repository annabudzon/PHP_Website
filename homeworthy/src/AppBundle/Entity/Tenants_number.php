<?php
/**
 * Created by PhpStorm.
 * User: Ania
 * Date: 2017-10-15
 * Time: 22:44
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="number_of_tenants")
 */
class Tenants_number
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id_tenants_number;

    /**
     * @ORM\Column(type="integer")
     */
    private $tenants_number;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Room_rental", mappedBy="tenants_number", cascade={"all", "remove"})
     */
    private $rooms_rental;

    public function __construct()
    {
        $this->rooms_rental = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getIdTenantsNumber()
    {
        return $this->id_tenants_number;
    }

    /**
     * @param mixed $id_tenants_number
     */
    public function setIdTenantsNumber($id_tenants_number)
    {
        $this->id_tenants_number = $id_tenants_number;
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


}