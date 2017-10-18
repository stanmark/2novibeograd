<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * League
 *
 * @ORM\Table(name="league")
 * @ORM\Entity
 * @Vich\Uploadable
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LeagueRepository")
 */
class League
{
    /**
     * @var string
     *
     * @ORM\Column(name="league", type="string", length=255, nullable=false)
     */
    private $league;

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
     * One place has Many Gallery.
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\LeagueGallery", mappedBy="league")
     */
    private $galerry;
    
    /**
     * One place has Many Gallery.
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Groupp", mappedBy="league")
     */
    private $groupp;
    
    
    
    
    public function __construct()
    {
       
        $this->$galerry = new \Doctrine\Common\Collections\ArrayCollection();
        $this->$groupp = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    

    /**
     * Set league
     *
     * @param string $league
     *
     * @return League
     */
    public function setLeague($league)
    {
        $this->league = $league;

        return $this;
    }

    /**
     * Get league
     *
     * @return string
     */
    public function getLeague()
    {
        return $this->league;
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
     * @return League
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
     * @return League
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
     * Add galerry
     *
     * @param \AppBundle\Entity\LeagueGallery $galerry
     *
     * @return League
     */
    public function addGalerry(\AppBundle\Entity\LeagueGallery $galerry)
    {
        $this->galerry[] = $galerry;

        return $this;
    }

    /**
     * Remove galerry
     *
     * @param \AppBundle\Entity\LeagueGallery $galerry
     */
    public function removeGalerry(\AppBundle\Entity\LeagueGallery $galerry)
    {
        $this->galerry->removeElement($galerry);
    }

    /**
     * Get galerry
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGalerry()
    {
        return $this->galerry;
    }

    /**
     * Add groupp
     *
     * @param \AppBundle\Entity\Groupp $groupp
     *
     * @return League
     */
    public function addGroupp(\AppBundle\Entity\Groupp $groupp)
    {
        $this->groupp[] = $groupp;

        return $this;
    }

    /**
     * Remove groupp
     *
     * @param \AppBundle\Entity\Groupp $groupp
     */
    public function removeGroupp(\AppBundle\Entity\Groupp $groupp)
    {
        $this->groupp->removeElement($groupp);
    }

    /**
     * Get groupp
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGroupp()
    {
        return $this->groupp;
    }
}
