<?php
/**
 * Created by PhpStorm.
 * User: Ania
 * Date: 2017-12-09
 * Time: 20:21
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="searcher")
 */
class OffersSearcher
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id_searcher;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\City", inversedBy="searcher")
     * @ORM\JoinColumn(name="id_city", referencedColumnName="id_city")
     */
    private $city;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Property_type", inversedBy="searcher")
     * @ORM\JoinColumn(name="id_property_type", referencedColumnName="id_property_type")
     */
    private $property;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Offer_type", inversedBy="searcher")
     * @ORM\JoinColumn(name="id_offer_type", referencedColumnName="id_offer_type")
     */
    private $offer;

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * @param mixed $property
     */
    public function setProperty($property)
    {
        $this->property = $property;
    }

    /**
     * @return Offer_type
     */
    public function getOffer()
    {
        return $this->offer;
    }

    /**
     * @param Offer_type $offer
     */
    public function setOffer($offer)
    {
        $this->offer = $offer;
    }

    /**
     * @return integer
     */
    public function getIdSearcher()
    {
        return $this->id_searcher;
    }

    /**
     * @param mixed $id_searcher
     */
    public function setIdSearcher($id_searcher)
    {
        $this->id_searcher = $id_searcher;
    }


}