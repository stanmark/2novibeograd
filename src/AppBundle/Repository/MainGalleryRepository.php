<?php

namespace AppBundle\Repository;

/**
 * MainGalleryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MainGalleryRepository extends \Doctrine\ORM\EntityRepository
{
    
    public function getAllImagesWhereMainIsTrue()
    {
        return $this->createQueryBuilder('u')
            ->where('u.mainPicture = 1')
            ->getQuery()->getResult();
    }
}