<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Tournament;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TournamentFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
            $tournament = new Tournament();
            $tournament->setName('Roland-Garros');
            $manager->persist($tournament);

            $tournament2 = new Tournament();
            $tournament2->setName('Wimbledon');
            $manager->persist($tournament2);

            $tournament3 = new Tournament();
            $tournament3->setName('Open d\'Australie');
            $manager->persist($tournament3);

            $tournament4 = new Tournament();
            $tournament4->setName('Open de brisbane');
            $manager->persist($tournament4);

            $manager->flush();
    }
}
