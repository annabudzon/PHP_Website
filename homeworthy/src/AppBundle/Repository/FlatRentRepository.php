<?php
/**
 * Created by PhpStorm.
 * User: Ania
 * Date: 2017-12-03
 * Time: 17:47
 */

namespace AppBundle\Repository;


use AppBundle\Entity\City;
use AppBundle\Entity\Offer_type;
use AppBundle\Entity\OffersSearcher;
use AppBundle\Entity\Property_type;
use Doctrine\ORM\EntityRepository;

class FlatRentRepository extends EntityRepository
{
    public function findOffersByUser($id)
    {
        $builder = $this->createQueryBuilder('p');
        $query = $builder->select('p')
            ->innerJoin('p.user', 'u')
            ->where('u.id = :id' )
            ->setParameter(':id', $id)
            ->orderBy('p.date', 'ASC')
            ->getQuery();

        return $query->getResult();
    }

    public function findOffersByChoices(OffersSearcher $choice)
    {
        $city = $choice->getCity();
        $property = $choice->getProperty();
        $offer = $choice->getOffer();

        $builder = $this->createQueryBuilder('p');
        $query = $builder->select('p')
            ->innerJoin('p.localization', 'l')
            ->innerJoin('l.city', 'c', 'WITH', 'c.id_city = :id_city')
            ->innerJoin('p.property_type', 'pt')
            ->andWhere('pt.id_property_type = :id_property')
            ->innerJoin('p.offer_type', 'ot', 'WITH', 'ot.id_offer_type = :id_offer')
            ->setParameters(array(':id_offer' => $offer->getIdOfferType(), 'id_property' => $property->getIdPropertyType(), ':id_city'=> $city->getIdCity()))
            ->orderBy('p.date', 'ASC')
            ->getQuery();

        return $query->getResult();
    }
}