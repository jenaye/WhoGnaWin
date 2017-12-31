<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Game;
use Doctrine\ORM\Query\Expr\Join;


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
        ->leftJoin(Game::class, 'g', Join::ON, $queryBuilder->expr()->orX(
            $queryBuilder->expr()->eq('g.player1', 'p'),
            $queryBuilder->expr()->eq('g.player2', 'p')
        ))->addSelect('g')
        ->where($queryBuilder->expr()->like('p.name', ':name'))
        ->setParameter('name', '%'.$playerName.'%')
        ->getQuery()->getOneOrNullResult();
}

    public function getPlayerByNameAndTournament($playerName, $tournamentName)
    {
    	$parameters = [
    			'tournament' => $tournamentName, 
   				'name' => '%'.$playerName.'%'
				];

        $queryBuilder = $this->createQueryBuilder('p');
        return $queryBuilder
			        		->where($queryBuilder->expr()
			            	->like('p.name', ':name'))
			            	->where('t.name = :tournament')
			            	->setParameter($parameters)
			            	->getQuery()->getOneOrNullResult();

    }
}
