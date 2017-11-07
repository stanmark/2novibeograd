<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

/**
 * teamMember
 *
 * @ORM\Table(name="team_member")
 * @Vich\Uploadable
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="AppBundle\Repository\teamMemberRepository")
 */
class teamMember
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    
    /**
     * @var string
     *
     * @ORM\Column(name="position", type="string", length=255)
     */
    private $position;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="education", type="string", length=255)
     */
    private $education;

    /**
     * @var string
     *
     * @ORM\Column(name="faceurl", type="string", length=255)
     */
    private $faceurl;

    /**
     * @var string
     *
     * @ORM\Column(name="gurl", type="string", length=255)
     */
    private $gurl;

    /**
     * @var string
     *
     * @ORM\Column(name="inurl", type="string", length=255)
     */
    private $inurl;

    
    
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;
     

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
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\place", inversedBy="member")
     * @ORM\JoinTable(name="member_place",
     *   joinColumns={
     *     @ORM\JoinColumn(name="member_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="place_id", referencedColumnName="id")
     *   }
     * )
     */
    private $place;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\MainGallery", mappedBy="teamMember")
     */
    private $mainGallery;
    
    
    
    
    public function __construct()
    {
        $this->place = new \Doctrine\Common\Collections\ArrayCollection();
//        $this->$mainGallery = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Year
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
     * @return Year
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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return teamMember
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return teamMember
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return teamMember
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set education
     *
     * @param string $education
     *
     * @return teamMember
     */
    public function setEducation($education)
    {
        $this->education = $education;

        return $this;
    }

    /**
     * Get education
     *
     * @return string
     */
    public function getEducation()
    {
        return $this->education;
    }

    /**
     * Set faceurl
     *
     * @param string $faceurl
     *
     * @return teamMember
     */
    public function setFaceurl($faceurl)
    {
        $this->faceurl = $faceurl;

        return $this;
    }

    /**
     * Get faceurl
     *
     * @return string
     */
    public function getFaceurl()
    {
        return $this->faceurl;
    }

    /**
     * Set gurl
     *
     * @param string $gurl
     *
     * @return teamMember
     */
    public function setGurl($gurl)
    {
        $this->gurl = $gurl;

        return $this;
    }

    /**
     * Get gurl
     *
     * @return string
     */
    public function getGurl()
    {
        return $this->gurl;
    }

    /**
     * Set inurl
     *
     * @param string $inurl
     *
     * @return teamMember
     */
    public function setInurl($inurl)
    {
        $this->inurl = $inurl;

        return $this;
    }

    /**
     * Get inurl
     *
     * @return string
     */
    public function getInurl()
    {
        return $this->inurl;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return teamMember
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
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
     * Set position
     *
     * @param string $position
     *
     * @return teamMember
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Add place
     *
     * @param \AppBundle\Entity\place $place
     *
     * @return teamMember
     */
    public function addPlace(\AppBundle\Entity\place $place)
    {
        $this->place[] = $place;

        return $this;
    }

    /**
     * Remove place
     *
     * @param \AppBundle\Entity\place $place
     */
    public function removePlace(\AppBundle\Entity\place $place)
    {
        $this->place->removeElement($place);
    }

    /**
     * Get place
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * Add mainGallery
     *
     * @param \AppBundle\Entity\MainGallery $mainGallery
     *
     * @return teamMember
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
}
