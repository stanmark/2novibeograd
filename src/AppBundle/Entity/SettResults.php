<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettResults
 *
 * @ORM\Table(name="sett_results", indexes={@ORM\Index(name="id_game", columns={"id_game"})})
 * @ORM\Entity
 */
class SettResults
{
    /**
     * @var integer
     *
     * @ORM\Column(name="team1_set", type="integer", nullable=false)
     */
    private $team1Set;

    /**
     * @var integer
     *
     * @ORM\Column(name="team2_set", type="integer", nullable=false)
     */
    private $team2Set;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     *
     * @var \AppBundle\Entity\Game
     *
     * Many Sets have One Game.
     * @ORM\ManyToOne(targetEntity="Game", inversedBy="$settresults")
     * @ORM\JoinColumn(name="id_game", referencedColumnName="id")    
     */
    private $idGame;
    
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
     * Set team1Set
     *
     * @param integer $team1Set
     *
     * @return SettResults
     */
    public function setTeam1Set($team1Set)
    {
        $this->team1Set = $team1Set;

        return $this;
    }

    /**
     * Get team1Set
     *
     * @return integer
     */
    public function getTeam1Set()
    {
        return $this->team1Set;
    }

    /**
     * Set team2Set
     *
     * @param integer $team2Set
     *
     * @return SettResults
     */
    public function setTeam2Set($team2Set)
    {
        $this->team2Set = $team2Set;

        return $this;
    }

    /**
     * Get team2Set
     *
     * @return integer
     */
    public function getTeam2Set()
    {
        return $this->team2Set;
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
     * @return SettResults
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
     * @return SettResults
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
     * Set idGame
     *
     * @param \AppBundle\Entity\Game $idGame
     *
     * @return SettResults
     */
    public function setIdGame(\AppBundle\Entity\Game $idGame = null)
    {
        $this->idGame = $idGame;

        return $this;
    }

    /**
     * Get idGame
     *
     * @return \AppBundle\Entity\Game
     */
    public function getIdGame()
    {
        return $this->idGame;
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
}
