<?php

namespace AppBundle\Repository;

/**
 * PlayerRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PlayerRepository extends \Doctrine\ORM\EntityRepository
{
    public function getPlayerByName($playerName)
    {
        $queryBuilder = $this->createQueryBuilder('p');
        return $queryBuilder
					       // ->leftJoin('p.games', 'AppBundle:Game')
			        		->where($queryBuilder->expr()
			            	->like('p.name', ':name'))
			            	->setParameter('name', '%'.$playerName.'%')
			            	->getQuery()->getOneOrNullResult();

    }
}
