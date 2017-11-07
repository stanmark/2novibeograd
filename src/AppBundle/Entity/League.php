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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\MainGallery", mappedBy="league")
     */
    private $mainGallery;
    
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Groupp", mappedBy="league")
     */
    private $groupp;
    
    
    
    
    public function __construct()
    {
              
        $this->$groupp = new \Doctrine\Common\Collections\ArrayCollection();
//        $this->$mainGallery = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add mainGallery
     *
     * @param \AppBundle\Entity\MainGallery $mainGallery
     *
     * @return League
     */
    public function addMainGallery(\AppBundle\Entity\MainGallery $mainGallery)
    {
        $this->mainGallery[] = $mainGallery;

        return $this;
    }

    /**
     * Remove mainGallery
     *
     * @param \AppBundle\Entity\MainGallery $mainGallery
     */
    public function removeMainGallery(\AppBundle\Entity\MainGallery $mainGallery)
    {
        $this->mainGallery->removeElement($mainGallery);
    }

    /**
     * Get mainGallery
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMainGallery()
    {
        return $this->mainGallery;
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
