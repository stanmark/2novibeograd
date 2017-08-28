<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * place
 *
 * @ORM\Table(name="place")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="AppBundle\Repository\placeRepository")
 * @Vich\Uploadable
 */
class place
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="adress", type="string", length=255)
     */
    private $adress;

    /**
     * @var string
     *
     * @ORM\Column(name="shortdescription", type="text", nullable=true)
     */
    private $shortdescription;
    
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;
    
    /**
     * @var string
     *
     * @ORM\Column(name="description1", type="text", nullable=true)
     */
    private $description1;
    
    
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
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\teamMember", mappedBy="place")
     */
    private $member;
    
    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;
    
    /**
     * @Vich\UploadableField(mapping="user_upload", fileNameProperty="url")
     * @var File
     */
    private $imageFile;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->member = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set title
     *
     * @param string $title
     *
     * @return place
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set adress
     *
     * @param string $adress
     *
     * @return place
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * Get adress
     *
     * @return string
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return place
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
     * Set url
     *
     * @param string $url
     *
     * @return teamMember
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

   

    /**
     * Set shortdescription
     *
     * @param string $shortdescription
     *
     * @return place
     */
    public function setShortdescription($shortdescription)
    {
        $this->shortdescription = $shortdescription;

        return $this;
    }

    /**
     * Get shortdescription
     *
     * @return string
     */
    public function getShortdescription()
    {
        return $this->shortdescription;
    }
  

    /**
     * Set description1
     *
     * @param string $description1
     *
     * @return place
     */
    public function setDescription1($description1)
    {
        $this->description1 = $description1;

        return $this;
    }

    /**
     * Get description1
     *
     * @return string
     */
    public function getDescription1()
    {
        return $this->description1;
    }

    /**
     * Add member
     *
     * @param \AppBundle\Entity\teamMember $member
     *
     * @return place
     */
    public function addMember(\AppBundle\Entity\teamMember $member)
    {
        $this->member[] = $member;

        return $this;
    }

    /**
     * Remove member
     *
     * @param \AppBundle\Entity\teamMember $member
     */
    public function removeMember(\AppBundle\Entity\teamMember $member)
    {
        $this->member->removeElement($member);
    }

    /**
     * Get member
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMember()
    {
        return $this->member;
    }
    
     public function setImageFile(File $url = null) {
        $this->imageFile = $url;
        return $this;
    }

    public function getImageFile() {
        return $this->imageFile;
    }
}
