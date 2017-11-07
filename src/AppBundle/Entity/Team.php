<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Team
 *
 * @ORM\Table(name="team")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TeamRepository")
 * @Vich\Uploadable
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
}
