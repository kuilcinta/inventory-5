<?php
/**
 * Created by PhpStorm.
 * User: tom.cannaerts
 * Date: 17/03/14
 * Time: 11:47
 */

namespace TomCan\CatalogueBundle\Entity;
use Doctrine\ORM\EntityRepository;

class SoftwareTitleRepository extends  EntityRepository {

    public function findOrdered($filter, $sort)
    {
        $cb = $this->getEntityManager()
            ->createQueryBuilder('t')
            ->select('t')
            ->from('CatalogueBundle:SoftwareTitle', 't')
            ->leftJoin('t.vendor', 'v');

        foreach ($filter as $fil) {
            $cb = $cb->where($fil);
        }

        foreach ($sort as $sor) {
            $cb->orderBy($sor[0], $sor[1]);
        }

        return $cb
            ->getQuery()
            ->getResult();
    }

}
