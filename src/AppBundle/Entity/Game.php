<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Game
 *
 * @ORM\Table(name="game")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GameRepository")
 */
class Game
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @var string
     *
     * @ORM\Column(name="terrain")
     */
    private $terrain;

    /**
     * @return string
     */
    public function getTerrain()
    {
        return $this->terrain;
    }

    /**
     * @param string $terrain
     */
    public function setTerrain($terrain)
    {
        $this->terrain = $terrain;
    }




    /**
     * @var string
     *
     * @ORM\Column(name="meteo")
     */
    private $meteo;

    /**
     * @return string
     */
    public function getMeteo()
    {
        return $this->meteo;
    }

    /**
     * @param string $meteo
     */
    public function setMeteo($meteo)
    {
        $this->meteo = $meteo;
    }

    /**
     * @return int
     */
    public function getPlayer1Score()
    {
        return $this->player1_score;
    }

    /**
     * @param int $player1_score
     */
    public function setPlayer1Score($player1_score)
    {
        $this->player1_score = $player1_score;
    }

    /**
     * @return int
     */
    public function getPlayer2Score()
    {
        return $this->player2_score;
    }

    /**
     * @param int $player2_score
     */
    public function setPlayer2Score($player2_score)
    {
        $this->player2_score = $player2_score;
    }

    /**
     * @return mixed
     */
    public function getPlayer1()
    {
        return $this->player1;
    }

    /**
     * @param mixed $player1
     */
    public function setPlayer1($player1)
    {
        $this->player1 = $player1;
    }

    /**
     * @return mixed
     */
    public function getPlayer2()
    {
        return $this->player2;
    }

    /**
     * @param mixed $player2
     */
    public function setPlayer2($player2)
    {
        $this->player2 = $player2;
    }

    /**
     * @return mixed
     */
    public function getTournaments()
    {
        return $this->tournaments;
    }

    /**
     * @param mixed $tournaments
     */
    public function setTournaments($tournaments)
    {
        $this->tournaments = $tournaments;
    }



    /**
     * @var int
     *
     * @ORM\Column(name="player1_score", type="integer")
     */
    private $player1_score;


    /**
     * @var int
     *
     * @ORM\Column(name="player2_score", type="integer")
     */
    private $player2_score;



    /**
     * @ORM\ManyToOne(targetEntity="Player", inversedBy="products")
     * @ORM\JoinColumn(name="player_id_1", referencedColumnName="id")
     */
    private $player1;

    /**
     * @ORM\ManyToOne(targetEntity="Player", inversedBy="products")
     * @ORM\JoinColumn(name="player_id_2", referencedColumnName="id")
     */
    private $player2;


    /**
     * @ORM\ManyToOne(targetEntity="Tournament", inversedBy="products")
     * @ORM\JoinColumn(name="tournament_id", referencedColumnName="id")
     */
    private $tournaments;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * method toostring
     */
    public function __toString()
    {
       return $this->getId();
    }

}

