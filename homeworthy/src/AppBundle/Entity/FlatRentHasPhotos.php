<?php
/**
 * Created by PhpStorm.
 * User: Ania
 * Date: 2017-12-13
 * Time: 16:21
 */

namespace Application\Sonata\MediaBundle\Entity;

use AppBundle\Entity\FlatRent;
use Application\Sonata\MediaBundle\Entity\Media;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="flat_rent_has_photos")
 */
class FlatRentHasPhotos
{
    /**
     * @var FlatRent
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\FlatRent", inversedBy="flat_photos", cascade={"all"})
     * @ORM\JoinColumn(name="flat_sale_id", referencedColumnName="id_flat_sale")
     */
    protected $flat_rent;

    /**
     * @var Media
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", inversedBy="flats_rental", cascade={"all"})
     * @ORM\JoinColumn(name="photo_id", referencedColumnName="id")
     */
    protected $photo;
}