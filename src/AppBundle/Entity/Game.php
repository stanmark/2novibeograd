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
     * @ORM\Column(name="number_set1", type="integer", nullable=false)
     */
    private $numberSet1;

    /**
     * @var integer
     *
     * @ORM\Column(name="set_team2", type="integer", nullable=false)
     */
    private $numberSet2;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
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
     * @var datetime $date
     *
     * @ORM\Column(type="date")
     */
    protected $date;
    
    /**
     * @var datetime $begin
     *
     * @ORM\Column(type="time")
     */
    protected $begin;
    
    /**
     * @var datetime $end
     *
     * @ORM\Column(type="time", nullable = true)
     */
    protected $end;
    
    
    
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
     * @var \AppBundle\Entity\Round
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Round")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="round_id", referencedColumnName="id")
     * })
     */
    private $round;
    
    /**
     * 
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\SettResults", mappedBy="game")
     */
    private $settresults;


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
     * Set numberSet1
     *
     * @param integer $numberSet1
     *
     * @return Game
     */
    public function setNumberSet1($numberSet1)
    {
        $this->numberSet1 = $numberSet1;

        return $this;
    }

    /**
     * Get numberSet1
     *
     * @return integer
     */
    public function getNumberSet1()
    {
        return $this->numberSet1;
    }

    /**
     * Set numberSet2
     *
     * @param integer $numberSet2
     *
     * @return Game
     */
    public function setNumberSet2($numberSet2)
    {
        $this->numberSet2 = $numberSet2;

        return $this;
    }

    /**
     * Get numberSet2
     *
     * @return integer
     */
    public function getNumberSet2()
    {
        return $this->numberSet2;
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Game
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set begin
     *
     * @param \DateTime $begin
     *
     * @return Game
     */
    public function setBegin($begin)
    {
        $this->begin = $begin;

        return $this;
    }

    /**
     * Get begin
     *
     * @return \DateTime
     */
    public function getBegin()
    {
        return $this->begin;
    }

    /**
     * Set end
     *
     * @param \DateTime $end
     *
     * @return Game
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
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
     * Get place
     *
     * @return \AppBundle\Entity\place
     */
    public function getPlace()
    {
        return $this->place;
    }

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
     * Set groupp
     *
     * @param \AppBundle\Entity\Groupp $groupp
     *
     * @return Game
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
     * Set round
     *
     * @param \AppBundle\Entity\Round $round
     *
     * @return Game
     */
    public function setRound(\AppBundle\Entity\Round $round = null)
    {
        $this->round = $round;

        return $this;
    }

    /**
     * Get round
     *
     * @return \AppBundle\Entity\Round
     */
    public function getRound()
    {
        return $this->round;
    }



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->settresults = new \Doctrine\Common\Collections\ArrayCollection();
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
}
