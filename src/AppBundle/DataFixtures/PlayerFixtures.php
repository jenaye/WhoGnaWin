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
            $player->setGender('Male');
            $manager->persist($player);

            $player2 = new Player();
            $player2->setName('Roger Federer');
            $player2->setAge(36);
            $player2->setGender('Male');
            $manager->persist($player2);

            $player3 = new Player();
            $player3->setName('Novak Djokovic');
            $player3->setAge(30);
            $player3->setGender('Male');
            $manager->persist($player3);

            $player4 = new Player();
            $player4->setName('Alexandr Dolgopolov');
            $player4->setAge(29);
            $player4->setGender('Male');
            $manager->persist($player4);

            $player5 = new Player();
            $player5->setName('Diego Schwartzman');
            $player5->setAge(29);
            $player5->setGender('Male');
            $manager->persist($player5);

            $player6 = new Player();
            $player6->setName('Steve Johnson');
            $player6->setAge(28);
            $player6->setGender('Male');
            $manager->persist($player6);

            $player7 = new Player();
            $player7->setName('Alex De Minaur');
            $player7->setAge(18);
            $player7->setGender('Male');
            $manager->persist($player7);

            $player8 = new Player();
            $player8->setName('Une fille');
            $player8->setAge(18);
            $player8->setGender('Female');
            $manager->persist($player8);

            $manager->flush();
    }
}
