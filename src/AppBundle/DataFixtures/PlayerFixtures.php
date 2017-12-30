<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Player;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PlayerFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
            $player = new Player();
            $player->setName('Rafael Nadal');
            $player->setAge(31);
            $manager->persist($player);

            $player2 = new Player();
            $player2->setName('Roger Federer');
            $player2->setAge(36);
            $manager->persist($player2);

            $player3 = new Player();
            $player3->setName('Novak Djokovic');
            $player3->setAge(30);
            $manager->persist($player3);

            $manager->flush();
    }
}
