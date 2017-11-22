<?php
/**
 * Created by PhpStorm.
 * User: Ania
 * Date: 2017-10-22
 * Time: 20:49
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="photo")
 */
class Photo
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id_photo;

    /**
     * @Assert\NotBlank(message="Please, upload images.")
     * @Assert\Image()
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Flat_rental", inversedBy="flat_photos")
     * @ORM\JoinColumn(name="id_flat", referencedColumnName="id_flat", onDelete="CASCADE")
     */
    private $flat_rental;

    /**
     * @Assert\NotBlank(message="Please, upload images.")
     * @Assert\Image()
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Room_rental", inversedBy="room_photos")
     * @ORM\JoinColumn(name="id_room", referencedColumnName="id_room", onDelete="CASCADE")
     */
    private $room_rental;

    /**
     * @Assert\NotBlank(message="Please, upload images.")
     * @Assert\Image()
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Flat_sale", inversedBy="flat_photos")
     * @ORM\JoinColumn(name="id_flat_sale", referencedColumnName="id_flat_sale", onDelete="CASCADE")
     */
    private $flat_sale;

    /**
     * @return mixed
     */
    public function getIdPhoto()
    {
        return $this->id_photo;
    }

    /**
     * @param mixed $id_photo
     */
    public function setIdPhoto($id_photo)
    {
        $this->id_photo = $id_photo;
    }

    /**
     * @return mixed
     */
    public function getFlatRental()
    {
        return $this->flat_rental;
    }

    /**
     * @param mixed $flat_rental
     */
    public function setFlatRental($flat_rental)
    {
        $this->flat_rental = $flat_rental;
    }

    /**
     * @return mixed
     */
    public function getRoomRental()
    {
        return $this->room_rental;
    }

    /**
     * @param mixed $room_rental
     */
    public function setRoomRental($room_rental)
    {
        $this->room_rental = $room_rental;
    }

    /**
     * @return mixed
     */
    public function getFlatSale()
    {
        return $this->flat_sale;
    }

    /**
     * @param mixed $flat_sale
     */
    public function setFlatSale($flat_sale)
    {
        $this->flat_sale = $flat_sale;
    }



}