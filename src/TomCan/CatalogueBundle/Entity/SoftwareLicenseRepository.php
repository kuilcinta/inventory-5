<?php
/**
 * Created by PhpStorm.
 * User: tom.cannaerts
 * Date: 17/03/14
 * Time: 11:47
 */

namespace TomCan\CatalogueBundle\Entity;
use Doctrine\ORM\EntityRepository;

class SoftwareLicenseRepository extends  EntityRepository {

    public function findOrdered($filter, $sort)
    {
        $cb = $this->getEntityManager()
            ->createQueryBuilder('l')
            ->select('l')
            ->from('CatalogueBundle:SoftwareLicense', 'l')
            ->leftJoin('l.softwareTitle', 't')
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
