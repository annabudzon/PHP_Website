<?php
/**
 * Created by PhpStorm.
 * User: Ania
 * Date: 2017-10-21
 * Time: 22:49
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="country")
 */
class Country
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id_country;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $country;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Localization", mappedBy="country", cascade={"persist","all", "remove"})
     */
    private $localizations;

    public function __construct()
    {
        $this->localizations = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getIdCountry()
    {
        return $this->id_country;
    }

    /**
     * @param mixed $id_country
     */
    public function setIdCountry($id_country)
    {
        $this->id_country = $id_country;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
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

    public function __toString()
    {
        return $this->country;
    }
}