<?php
/**
 * Created by PhpStorm.
 * User: Ania
 * Date: 2017-12-13
 * Time: 16:00
 */

namespace AppBundle\Entity;

use Application\Sonata\MediaBundle\Entity\Media;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="room_has_photos")
 */
class RoomHasPhotos
{
    /**
     * @var RoomRent
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\RoomRent", inversedBy="room_photos", cascade={"all"})
     * @ORM\JoinColumn(name="room_rental_id", referencedColumnName="id_room")
     */
    protected $room_rental;

    /**
     * @var Media
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", inversedBy="room_rental", cascade={"all"})
     * @ORM\JoinColumn(name="photo_id", referencedColumnName="id")
     */
    protected $photo;
}