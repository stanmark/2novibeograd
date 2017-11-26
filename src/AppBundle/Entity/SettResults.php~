<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SettResults
 *
 * @ORM\Table(name="sett_results" )
 * @ORM\Entity
 */
class SettResults
{
    /**
     * @var integer
     *
     * @ORM\Column(name="points_number1", type="integer", nullable=false)
     */
    private $pointsNumber1;

    /**
     * @var integer
     *
     * @ORM\Column(name="points_number2", type="integer", nullable=false)
     */
    private $pointsNumber2;

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
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Game", inversedBy="settresults")
     * @ORM\JoinColumn(name="game_id", referencedColumnName="id")
     */
    private $game;
    

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
     * Set pointsNumber1
     *
     * @param integer $pointsNumber1
     *
     * @return SettResults
     */
    public function setPointsNumber1($pointsNumber1)
    {
        $this->pointsNumber1 = $pointsNumber1;

        return $this;
    }

    /**
     * Get pointsNumber1
     *
     * @return integer
     */
    public function getPointsNumber1()
    {
        return $this->pointsNumber1;
    }

    /**
     * Set pointsNumber2
     *
     * @param integer $pointsNumber2
     *
     * @return SettResults
     */
    public function setPointsNumber2($pointsNumber2)
    {
        $this->pointsNumber2 = $pointsNumber2;

        return $this;
    }

    /**
     * Get pointsNumber2
     *
     * @return integer
     */
    public function getPointsNumber2()
    {
        return $this->pointsNumber2;
    }

    /**
     * Set game
     *
     * @param \AppBundle\Entity\Game $game
     *
     * @return SettResults
     */
    public function setGame(\AppBundle\Entity\Game $game = null)
    {
        $this->game = $game;

        return $this;
    }

    /**
     * Get game
     *
     * @return \AppBundle\Entity\Game
     */
    public function getGame()
    {
        return $this->game;
    }
}
