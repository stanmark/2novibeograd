<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Time
 *
 * @ORM\Table(name="time")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="AppBundle\Repository\timeRepository")
 */
class Time
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
     * @var \DateTime
     *
     * @ORM\Column(name="day",  type="string", length=255)
     */
    private $day;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="begin", type="datetime")
     */
    private $begin;

    /**
     * @var string
     *
     * @ORM\Column(name="end", type="datetime")
     */
    private $end;
    
    
    /**
     * @var \AppBundle\Entity\place
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\place", inversedBy="time")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="place_id", referencedColumnName="id")
     * })
     */
     private $place;
    
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
     * @return Time
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
     * @return Time
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
     * Set place
     *
     * @param \AppBundle\Entity\place $place
     *
     * @return Time
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
     * Set day
     *
     * @param string $day
     *
     * @return Time
     */
    public function setDay($day)
    {
        $this->day = $day;

        return $this;
    }

    /**
     * Get day
     *
     * @return string
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * Set begin
     *
     * @param \DateTime $begin
     *
     * @return Time
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
     * @return Time
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
}
