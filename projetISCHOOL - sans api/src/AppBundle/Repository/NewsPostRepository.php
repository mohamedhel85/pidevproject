<?php

namespace AppBundle\Repository;

use AppBundle\Entity\NewsPost;

/**
 * NewsPostRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class NewsPostRepository extends \Doctrine\ORM\EntityRepository
{
    public function getNewPosts()
    {
        $em= $this->getEntityManager();
        $qb=$em->createQueryBuilder();
        $query = $qb->select('r')
            ->from('AppBundle:NewsPost','r')
            ->orderBy('r.id','DESC')
            ->getQuery();
        $posts=$query->setMaxResults(5)->getResult();
        return $posts;
    }
}
