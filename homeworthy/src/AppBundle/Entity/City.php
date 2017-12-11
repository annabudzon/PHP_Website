<?php
/**
 * Created by PhpStorm.
 * User: Ania
 * Date: 2017-10-15
 * Time: 22:47
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="city")
 */
class City
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id_city;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $city;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Localization", mappedBy="city", cascade={"persist","all", "remove"})
     */
    private $localizations;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\OffersSearcher", mappedBy="city", cascade={"all", "remove"})
     */
    private $searcher;

    public function __construct()
    {
        $this->localizations = new ArrayCollection();
        $this->searcher = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getIdCity()
    {
        return $this->id_city;
    }

    /**
     * @param mixed $id_city
     */
    public function setIdCity($id_city)
    {
        $this->id_city = $id_city;
    }

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
    public function getSearcher()
    {
        return $this->searcher;
    }

    /**
     * @param mixed $searcher
     */
    public function setSearcher($searcher)
    {
        $this->searcher = $searcher;
    }

    public function __toString()
    {
        return $this->city;
    }


}