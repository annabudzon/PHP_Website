<?php
/**
 * Created by PhpStorm.
 * User: Ania
 * Date: 2017-12-13
 * Time: 16:14
 */

namespace AppBundle\Entity;

use Application\Sonata\MediaBundle\Entity\Media;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="flat_sale_has_photos")
 */
class FlatSaleHasPhotos
{
    /**
     * @var FlatSale
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\FlatSale", inversedBy="flat_photos", cascade={"all"})
     * @ORM\JoinColumn(name="flat_sale_id", referencedColumnName="id_flat_sale")
     */
    protected $flat_sale;

    /**
     * @var Media
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", inversedBy="flats_sale", cascade={"all"})
     * @ORM\JoinColumn(name="photo_id", referencedColumnName="id")
     */
    protected $photo;
}