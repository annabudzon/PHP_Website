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
abstract class Property_sale
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    //private $id_property_sale;

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
     * @ORM\Column(type="float")
     */
    protected $meter_price;
    /**
     * @ORM\Column(type="float")
     */
    protected $total_price;

    /**
     * @ORM\Column(type="string", length=200)
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
     * @ORM\Column(type="boolean")
     */
    protected $furnished;

}