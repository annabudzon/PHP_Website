<?php
/**
 * Created by PhpStorm.
 * User: Ania
 * Date: 2017-10-22
 * Time: 20:49
 */

namespace AppBundle\Entity;

use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
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
     *@Assert\File(
     *     mimeTypes = {"image/png", "image/jpeg", "image/jpg"},
     *     mimeTypesMessage = "Please upload a valid PDF or valid IMAGE")
     *@var File
     *
     */
    public $photo;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $photo_name;

    /**
     * Image path
     *
     * @var string
     *
     * @ORM\Column(type="text", length=255, nullable=false)
     */
    protected $path;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\FlatRent", inversedBy="flat_photos")
     * @ORM\JoinColumn(name="id_flat", referencedColumnName="id_flat", onDelete="CASCADE")
     */
    private $flat_rental;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\RoomRent", mappedBy="plan", cascade={"all", "remove"})
     */
    private $room_rental_plan;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\RoomRent", inversedBy="room_photos")
     * @ORM\JoinColumn(name="id_room", referencedColumnName="id_room", onDelete="CASCADE")
     */
    private $room_rental;



    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\FlatSale", inversedBy="flat_photos")
     * @ORM\JoinColumn(name="id_flat_sale", referencedColumnName="id_flat_sale", onDelete="CASCADE")
     */
    private $flat_sale;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @return integer
     */
    public function getIdPhoto()
    {
        return $this->id_photo;
    }

    /**
     * @param integer $id_photo
     */
    public function setIdPhoto($id_photo)
    {
        $this->id_photo = $id_photo;
    }

    /**
     * @return FlatRent
     */
    public function getFlatRental()
    {
        return $this->flat_rental;
    }

    /**
     * @param FlatRent $flat_rental
     */
    public function setFlatRental($flat_rental)
    {
        $this->flat_rental = $flat_rental;
    }

    /**
     * @return RoomRent
     */
    public function getRoomRental()
    {
        return $this->room_rental;
    }

    /**
     * @param RoomRent $room_rental
     */
    public function setRoomRental($room_rental)
    {
        $this->room_rental = $room_rental;
    }

    /**
     * @return FlatSale
     */
    public function getFlatSale()
    {
        return $this->flat_sale;
    }

    /**
     * @param FlatSale $flat_sale
     */
    public function setFlatSale($flat_sale)
    {
        $this->flat_sale = $flat_sale;
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $photo
     *
     * @return Photo
     */
    public function setImageFile(File $photo = null )
    {
        $this->photo = $photo;

        if ($this->photo instanceof UploadedFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }


    /**
     * @return File|null
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @return string|null
     */
    public function getPhotoName()
    {
        return $this->photo_name;
    }

    /**
     * @param string $photo_name
     */
    public function setPhotoName($photo_name)
    {
        $this->photo_name = $photo_name;
    }

    /**
     *
     * @return Photo
     */
    public function getPhotoSize()
    {
        return $this->photo_size;
    }

    /**
     * @param integer $photo_size
     */
    public function setPhotoSize($photo_size)
    {
        $this->photo_size = $photo_size;
    }

    /**
     * @return mixed
     */
    public function getRoomRentalPlan()
    {
        return $this->room_rental_plan;
    }

    /**
     * @param mixed $room_rental_plan
     */
    public function setRoomRentalPlan($room_rental_plan)
    {
        $this->room_rental_plan = $room_rental_plan;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }



}