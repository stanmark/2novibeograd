<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Galerry
 *
 * @ORM\Table(name="galerry")
 * @Vich\Uploadable
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GalerryRepository")
 */
class Galerry
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
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;
    
    /**
     * @Vich\UploadableField(mapping="user_upload", fileNameProperty="url")
     * @var File
     */
    private $imageFile;

    /**
     * @var string
     *
     * @ORM\Column(name="alt", type="string", length=255)
     */
    private $alt;
    
    /**
     * @var \AppBundle\Entity\place
     *
     * Many Galerry have One Place.
     * @ORM\ManyToOne(targetEntity="place", inversedBy="galerry")
     * @ORM\JoinColumn(name="place_id", referencedColumnName="id")
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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Galerry
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
     * Set alt
     *
     * @param string $alt
     *
     * @return Galerry
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return string
     */
    public function getAlt()
    {
        return $this->alt;
    }
    
    public function setImageFile(File $url = null) {
        $this->imageFile = $url;
       if ($this->image instanceof UploadedFile) {
            $this->updated = new \DateTime('now');
        }
    }

    public function getImageFile() {
        return $this->imageFile;
    }
    

    /**
     * Set place
     *
     * @param \AppBundle\Entity\place $place
     *
     * @return Galerry
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
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Galerry
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
     * @return Galerry
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
}
