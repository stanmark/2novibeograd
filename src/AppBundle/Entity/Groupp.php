<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Groupp
 *
 * @ORM\Table(name="groupp")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Groupp
{
    /**
     * @var string
     *
     * @ORM\Column(name="groupp", type="string", length=255, nullable=false)
     */
    private $groupp;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
    /**
     * @var datetime $created
     *
     * @ORM\Column(type="datetime")
     */
    protected $created;

    /**
     * @var datetime $updated
     * 
     * @ORM\Column(type="datetime", nullable = true)
     */
    protected $updated;
    
    /**
     * @var \AppBundle\Entity\League
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\League")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="league_id", referencedColumnName="id")
     * })
     */
    private $league;
    
    /**
     * 
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Team", mappedBy="group")
     */
    private $team;
    
    /**
     * 
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Game", mappedBy="groupp")
     */
    private $game;
    
     public function __construct()
    {
       
        $this->$team = new \Doctrine\Common\Collections\ArrayCollection();       
        $this->$game = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set groupp
     *
     * @param string $groupp
     *
     * @return Groupp
     */
    public function setGroupp($groupp)
    {
        $this->groupp = $groupp;

        return $this;
    }

    /**
     * Get groupp
     *
     * @return string
     */
    public function getGroupp()
    {
        return $this->groupp;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Groupp
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     *
     * @return Groupp
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }
    
     /**
     * Gets triggered only on insert
     * 
     * @ORM\PrePersist
     */
    public function onPrePersist()
    {
        $this->created = new \DateTime("now");
    }

    /**
     * Gets triggered every time on update

     * @ORM\PreUpdate
     */
    public function onPreUpdate()
    {
        $this->updated = new \DateTime("now");
    }

    /**
     * Set league
     *
     * @param \AppBundle\Entity\League $league
     *
     * @return Groupp
     */
    public function setLeague(\AppBundle\Entity\League $league = null)
    {
        $this->league = $league;

        return $this;
    }

    /**
     * Get league
     *
     * @return \AppBundle\Entity\League
     */
    public function getLeague()
    {
        return $this->league;
    }
    
  

    /**
     * Add team
     *
     * @param \AppBundle\Entity\Team $team
     *
     * @return Groupp
     */
    public function addTeam(\AppBundle\Entity\Team $team)
    {
        $this->team[] = $team;

        return $this;
    }

    /**
     * Remove team
     *
     * @param \AppBundle\Entity\Team $team
     */
    public function removeTeam(\AppBundle\Entity\Team $team)
    {
        $this->team->removeElement($team);
    }

    /**
     * Get team
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * Add round
     *
     * @param \AppBundle\Entity\Game $round
     *
     * @return Groupp
     */
    public function addRound(\AppBundle\Entity\Game $round)
    {
        $this->round[] = $round;

        return $this;
    }

    /**
     * Remove round
     *
     * @param \AppBundle\Entity\Game $round
     */
    public function removeRound(\AppBundle\Entity\Game $round)
    {
        $this->round->removeElement($round);
    }

    /**
     * Get round
     *
     * @return \Doctrine\Common\Collections\Collection
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
     * @return Groupp
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
}
