<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Game;
use AppBundle\Entity\Player;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class GameFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $game = new Game();
        $game->setPlayer1(1);
        $game->setPlayer1Score(1);

        $game->setPlayer2(2);
        $game->setPlayer1Score(2);
        $game->setMeteo('sec');
        $game->setDate('2017-01-01');

        $game->setTournaments(3);

        $manager->persist($game);
        $manager->flush();
    }
}
