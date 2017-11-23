<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Round
 *
 * @ORM\Table(name="round")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RoundRepository")
 */
class Round
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
     * @ORM\Column(name="rounds", type="string", length=255)
     */
    private $rounds;
    
    /**
     * @Gedmo\Slug(fields={"rounds"})
     * @ORM\Column(type="string", unique=true)
     */
    private $slug;
    
    
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Game", mappedBy="round")
     */
    private $game;
    
    
    /**
     * @var \AppBundle\Entity\Groupp
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Groupp", inversedBy="round")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="groupp_id", referencedColumnName="id")
     * })
     */
    private $groupp;
    
    
    
//    public function __construct()
//    {
//        $this->$game = new \Doctrine\Common\Collections\ArrayCollection();
//    }
    


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
     * Set round
     *
     * @param string $round
     *
     * @return Round
     */
    public function setRound($round)
    {
        $this->round = $round;

        return $this;
    }

    /**
     * Get round
     *
     * @return string
     */
    public function getRound()
    {
        return $this->round;
    }

    /**
     * Add game
     *
     * @param \AppBundle\Entity\Game $game
     *
     * @return Round
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
     * Set groupp
     *
     * @param \AppBundle\Entity\Groupp $groupp
     *
     * @return Round
     */
    public function setGroupp(\AppBundle\Entity\Groupp $groupp = null)
    {
        $this->groupp = $groupp;

        return $this;
    }

    /**
     * Get groupp
     *
     * @return \AppBundle\Entity\Groupp
     */
    public function getGroupp()
    {
        return $this->groupp;
    }

    /**
     * Set rounds
     *
     * @param string $rounds
     *
     * @return Round
     */
    public function setRounds($rounds)
    {
        $this->rounds = $rounds;

        return $this;
    }

    /**
     * Get rounds
     *
     * @return string
     */
    public function getRounds()
    {
        return $this->rounds;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Round
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->game = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
