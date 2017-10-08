<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Game
 *
 * @ORM\Table(name="game")
 * @ORM\Entity
 */
class Game
{
    

    /**
     * @var integer
     *
     * @ORM\Column(name="bod_team1", type="integer", nullable=false)
     */
    private $bodTeam1;

    /**
     * @var integer
     *
     * @ORM\Column(name="bod_team2", type="integer", nullable=false)
     */
    private $bodTeam2;

    /**
     * @var integer
     *
     * @ORM\Column(name="set_team1", type="integer", nullable=false)
     */
    private $setTeam1;

    /**
     * @var integer
     *
     * @ORM\Column(name="set_team2", type="integer", nullable=false)
     */
    private $setTeam2;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
    /**
     * One place has Many Gallery.
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\SettResults", mappedBy="idGame")
     */
    private $settresults;

    
    /**
     * @var \AppBundle\Entity\place
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\place")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="place_id", referencedColumnName="id")
     * })
     */
    private $place;


    /**
     * @var \AppBundle\Entity\Team
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Team")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="team1_id", referencedColumnName="id")
     * })
     */
    private $team1;

    /**
     * @var \AppBundle\Entity\Team
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Team")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="team2_id", referencedColumnName="id")
     * })
     */
    private $team2;
    
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

    public function __construct()
    {
       
        $this->game = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

    /**
     * Set result
     *
     * @param integer $result
     *
     * @return Game
     */
    public function setResult($result)
    {
        $this->result = $result;

        return $this;
    }

    /**
     * Get result
     *
     * @return integer
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Set bodTeam1
     *
     * @param integer $bodTeam1
     *
     * @return Game
     */
    public function setBodTeam1($bodTeam1)
    {
        $this->bodTeam1 = $bodTeam1;

        return $this;
    }

    /**
     * Get bodTeam1
     *
     * @return integer
     */
    public function getBodTeam1()
    {
        return $this->bodTeam1;
    }

    /**
     * Set bodTeam2
     *
     * @param integer $bodTeam2
     *
     * @return Game
     */
    public function setBodTeam2($bodTeam2)
    {
        $this->bodTeam2 = $bodTeam2;

        return $this;
    }

    /**
     * Get bodTeam2
     *
     * @return integer
     */
    public function getBodTeam2()
    {
        return $this->bodTeam2;
    }

    /**
     * Set setTeam1
     *
     * @param integer $setTeam1
     *
     * @return Game
     */
    public function setSetTeam1($setTeam1)
    {
        $this->setTeam1 = $setTeam1;

        return $this;
    }

    /**
     * Get setTeam1
     *
     * @return integer
     */
    public function getSetTeam1()
    {
        return $this->setTeam1;
    }

    /**
     * Set setTeam2
     *
     * @param integer $setTeam2
     *
     * @return Game
     */
    public function setSetTeam2($setTeam2)
    {
        $this->setTeam2 = $setTeam2;

        return $this;
    }

    /**
     * Get setTeam2
     *
     * @return integer
     */
    public function getSetTeam2()
    {
        return $this->setTeam2;
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
     * @return Game
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
     * @return Game
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
     * Set league
     *
     * @param \AppBundle\Entity\League $league
     *
     * @return Game
     */
   

    /**
     * Set team1
     *
     * @param \AppBundle\Entity\Team $team1
     *
     * @return Game
     */
    public function setTeam1(\AppBundle\Entity\Team $team1 = null)
    {
        $this->team1 = $team1;

        return $this;
    }

    /**
     * Get team1
     *
     * @return \AppBundle\Entity\Team
     */
    public function getTeam1()
    {
        return $this->team1;
    }

    /**
     * Set team2
     *
     * @param \AppBundle\Entity\Team $team2
     *
     * @return Game
     */
    public function setTeam2(\AppBundle\Entity\Team $team2 = null)
    {
        $this->team2 = $team2;

        return $this;
    }

    /**
     * Get team2
     *
     * @return \AppBundle\Entity\Team
     */
    public function getTeam2()
    {
        return $this->team2;
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
     * Set place
     *
     * @param \AppBundle\Entity\place $place
     *
     * @return Game
     */
    public function setPlace(\AppBundle\Entity\place $place = null)
    {
        $this->place = $place;

        return $this;
    }

    

    /**
     * Add settresult
     *
     * @param \AppBundle\Entity\SettResults $settresult
     *
     * @return Game
     */
    public function addSettresult(\AppBundle\Entity\SettResults $settresult)
    {
        $this->settresults[] = $settresult;

        return $this;
    }

    /**
     * Remove settresult
     *
     * @param \AppBundle\Entity\SettResults $settresult
     */
    public function removeSettresult(\AppBundle\Entity\SettResults $settresult)
    {
        $this->settresults->removeElement($settresult);
    }

    /**
     * Get settresults
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSettresults()
    {
        return $this->settresults;
    }

    /**
     * Get place
     *
     * @return \AppBundle\Entity\place
     */
    public function getPlace()
    {
        return $this->place;
    }
}
