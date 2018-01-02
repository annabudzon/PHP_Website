<?php
/**
 * Created by PhpStorm.
 * User: Ania
 * Date: 2017-10-21
 * Time: 22:33
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\MappedSuperclass;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @MappedSuperclass
 */
abstract class Property_rental
{

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $title;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $date;

    /**
     * @ORM\Column(type="float")
     */
    protected $size;

    /**
     * @ORM\Column(type="string", length=600)
     */
    protected $description;

    /**
     * @ORM\Column(type="date")
     */
    protected $available;

    /**
     * @ORM\Column(type="date")
     */
    protected $renovation;

    /**
     * @ORM\Column(type="float")
     */
    protected $rent_price;

    /**
     * @ORM\Column(type="float")
     */
    protected $owner_price;

    /**
     * @ORM\Column(type="float")
     */
    protected $media_price;

    /**
     * @ORM\Column(type="float")
     */
    protected $advance;

    /**
     * @ORM\Column(type="float")
     */
    protected $total_price;

    /**
     * @ORM\Column(type="integer")
     */
    protected $floor;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $furnished;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $balcony;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $smoker;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $pets;

}