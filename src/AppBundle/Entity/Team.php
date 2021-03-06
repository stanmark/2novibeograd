<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;


/**
 * Team
 *
 * @ORM\Table(name="team")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TeamRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Team
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
     * @ORM\Column(name="team", type="string", length=255)
     */
    private $team;
    
     /**
     * @Gedmo\Slug(fields={"team"})
     * @ORM\Column(type="string", unique=true)
     */
    private $slug;

    /**
     * @var \AppBundle\Entity\Groupp
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Groupp", inversedBy="team")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="groupp_id", referencedColumnName="id")
     * })
     * 
     */
    private $groupp;
    
    /**
     * 
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Game", mappedBy="team1")
     */
    private $team1game;
    
    /**
     * 
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Game", mappedBy="team2")
     */
    private $team2game;

    
    
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
     * Set team
     *
     * @param string $team
     *
     * @return Team
     */
    public function setTeam($team)
    {
        $this->team = $team;

        return $this;
    }

    /**
     * Get team
     *
     * @return string
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Team
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
     * @return Team
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
     * Set groupp
     *
     * @param \AppBundle\Entity\Groupp $groupp
     *
     * @return Team
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
     * Set slug
     *
     * @param string $slug
     *
     * @return Team
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
        $this->team1game = new \Doctrine\Common\Collections\ArrayCollection();
        $this->team2game = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add team1game
     *
     * @param \AppBundle\Entity\Game $team1game
     *
     * @return Team
     */
    public function addTeam1game(\AppBundle\Entity\Game $team1game)
    {
        $this->team1game[] = $team1game;

        return $this;
    }

    /**
     * Remove team1game
     *
     * @param \AppBundle\Entity\Game $team1game
     */
    public function removeTeam1game(\AppBundle\Entity\Game $team1game)
    {
        $this->team1game->removeElement($team1game);
    }

    /**
     * Get team1game
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTeam1game()
    {
        return $this->team1game;
    }

    /**
     * Add team2game
     *
     * @param \AppBundle\Entity\Game $team2game
     *
     * @return Team
     */
    public function addTeam2game(\AppBundle\Entity\Game $team2game)
    {
        $this->team2game[] = $team2game;

        return $this;
    }

    /**
     * Remove team2game
     *
     * @param \AppBundle\Entity\Game $team2game
     */
    public function removeTeam2game(\AppBundle\Entity\Game $team2game)
    {
        $this->team2game->removeElement($team2game);
    }

    /**
     * Get team2game
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTeam2game()
    {
        return $this->team2game;
    }
}
