<?php
/**
 * Created by PhpStorm.
 * User: Ania
 * Date: 2017-12-03
 * Time: 17:47
 */

namespace AppBundle\Repository;


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
}