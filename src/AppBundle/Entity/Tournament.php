<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Tournament
 *
 * @ORM\Table(name="tournament")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TournamentRepository")
 */
class Tournament
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
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Le tournoi doit faire au moins {{ limit }} characters",
     *      maxMessage = "le tournoi ne peut pas dépasser {{ limit }} characters"
     * )
     * @ORM\Column(name="name", type="string", length=60, nullable=true, unique=true)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Game", mappedBy="tournaments")
     */
    private $game;


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
     * Set name
     *
     * @param string $name
     *
     * @return Tournament
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->game = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add game
     *
     * @param \AppBundle\Entity\Game $game
     *
     * @return Tournament
     */
    public function addGame(\AppBundle\Entity\Game $game)
    {
        $this->game[] = $game;

        return $this;
    }

    /**
     * Remove game
     *
     * @param \AppBundle\Entity\Game $game
     */
    public function removeGame(\AppBundle\Entity\Game $game)
    {
        $this->game->removeElement($game);
    }

    /**
     * Get game
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGame()
    {
        return $this->game;
    }

    /**
     * method toostring
     */
    public function __toString()
    {
        return $this->getName();
    }
}
