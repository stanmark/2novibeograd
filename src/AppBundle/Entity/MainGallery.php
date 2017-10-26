<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * MainGallery
 *
 * @ORM\Table(name="main_gallery")
 * @Vich\Uploadable
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MainGalleryRepository")
 */
class MainGallery
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
     * @var bool
     *
     * @ORM\Column(name="mainPicture", type="boolean", nullable=true)
     */
    private $mainPicture;
    
    /**
     * @var bool
     *
     * @ORM\Column(name="mainPictureGallery", type="boolean", nullable=true)
     */
    private $mainPictureGallery;
    
   /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\League", inversedBy="mainGallery")
     * @ORM\JoinTable(name="mainGallery_league",
     *   joinColumns={
     *     @ORM\JoinColumn(name="mainGallerry_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="league_id", referencedColumnName="id")
     *   }
     * )
     */
    private $league;
    
    
     /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\teamMember", inversedBy="mainGallery")
     * @ORM\JoinTable(name="mainGallery_teamMember",
     *   joinColumns={
     *     @ORM\JoinColumn(name="mainGallerry_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="teamMember_id", referencedColumnName="id")
     *   }
     * )
     */
    private $teamMember;
    
     /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\place", inversedBy="mainGallery")
     * @ORM\JoinTable(name="mainGallery_place",
     *   joinColumns={
     *     @ORM\JoinColumn(name="mainGallerry_id", referencedColumnName="id")
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
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\HomeSlider", inversedBy="mainGallery")
     * @ORM\JoinTable(name="mainGallery_HomeSlider",
     *   joinColumns={
     *     @ORM\JoinColumn(name="mainGallerry_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="HomeSlider_id", referencedColumnName="id")
     *   }
     * )
     */
    private $homeSlider;
    
    
    
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\GalleryCategory", inversedBy="mainCategory")
     * @ORM\JoinTable(name="mainGallery_galleryCategory",
     *   joinColumns={
     *     @ORM\JoinColumn(name="mainGallerry_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="GalleryCategory_id", referencedColumnName="id")
     *   }
     * )
     */
    private $galleryCategory;
    
    
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;
    
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
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
     * @return MainGallery
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
     * Set mainPicture
     *
     * @param boolean $mainPicture
     *
     * @return MainGallery
     */
    public function setMainPicture($mainPicture)
    {
        $this->mainPicture = $mainPicture;

        return $this;
    }

    /**
     * Get mainPicture
     *
     * @return bool
     */
    public function getMainPicture()
    {
        return $this->mainPicture;
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
    
    
    public function setImageFile(File $url = null) {
        $this->imageFile = $url;
        return $this;
    }

    public function getImageFile() {
        return $this->imageFile;
    }

    /**
     * Set alt
     *
     * @param string $alt
     *
     * @return MainGallery
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

    /**
     * Set title
     *
     * @param string $title
     *
     * @return MainGallery
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
     * Set description
     *
     * @param string $description
     *
     * @return MainGallery
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
     * Set created
     *
     * @param \DateTime $created
     *
     * @return MainGallery
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
     * @return MainGallery
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
     * Constructor
     */
    public function __construct()
    {
        $this->league = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add league
     *
     * @param \AppBundle\Entity\League $league
     *
     * @return MainGallery
     */
    public function addLeague(\AppBundle\Entity\League $league)
    {
        $this->league[] = $league;

        return $this;
    }

    /**
     * Remove league
     *
     * @param \AppBundle\Entity\League $league
     */
    public function removeLeague(\AppBundle\Entity\League $league)
    {
        $this->league->removeElement($league);
    }

    /**
     * Get league
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLeague()
    {
        return $this->league;
    }

    /**
     * Add teamMember
     *
     * @param \AppBundle\Entity\teamMember $teamMember
     *
     * @return MainGallery
     */
    public function addTeamMember(\AppBundle\Entity\teamMember $teamMember)
    {
        $this->teamMember[] = $teamMember;

        return $this;
    }

    /**
     * Remove teamMember
     *
     * @param \AppBundle\Entity\teamMember $teamMember
     */
    public function removeTeamMember(\AppBundle\Entity\teamMember $teamMember)
    {
        $this->teamMember->removeElement($teamMember);
    }

    /**
     * Get teamMember
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTeamMember()
    {
        return $this->teamMember;
    }

    /**
     * Add place
     *
     * @param \AppBundle\Entity\place $place
     *
     * @return MainGallery
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
     * Add homeSlider
     *
     * @param \AppBundle\Entity\HomeSlider $homeSlider
     *
     * @return MainGallery
     */
    public function addHomeSlider(\AppBundle\Entity\HomeSlider $homeSlider)
    {
        $this->homeSlider[] = $homeSlider;

        return $this;
    }

    /**
     * Remove homeSlider
     *
     * @param \AppBundle\Entity\HomeSlider $homeSlider
     */
    public function removeHomeSlider(\AppBundle\Entity\HomeSlider $homeSlider)
    {
        $this->homeSlider->removeElement($homeSlider);
    }

    /**
     * Get homeSlider
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHomeSlider()
    {
        return $this->homeSlider;
    }

    /**
     * Set mainPictureGallery
     *
     * @param boolean $mainPictureGallery
     *
     * @return MainGallery
     */
    public function setMainPictureGallery($mainPictureGallery)
    {
        $this->mainPictureGallery = $mainPictureGallery;

        return $this;
    }

    /**
     * Get mainPictureGallery
     *
     * @return boolean
     */
    public function getMainPictureGallery()
    {
        return $this->mainPictureGallery;
    }

    /**
     * Set galleryCategory
     *
     * @param \AppBundle\Entity\GalleryCategory $galleryCategory
     *
     * @return MainGallery
     */
    public function setGalleryCategory(\AppBundle\Entity\GalleryCategory $galleryCategory = null)
    {
        $this->galleryCategory = $galleryCategory;

        return $this;
    }

    /**
     * Get galleryCategory
     *
     * @return \AppBundle\Entity\GalleryCategory
     */
    public function getGalleryCategory()
    {
        return $this->galleryCategory;
    }

    /**
     * Add galleryCategory
     *
     * @param \AppBundle\Entity\GalleryCategory $galleryCategory
     *
     * @return MainGallery
     */
    public function addGalleryCategory(\AppBundle\Entity\GalleryCategory $galleryCategory)
    {
        $this->galleryCategory[] = $galleryCategory;

        return $this;
    }

    /**
     * Remove galleryCategory
     *
     * @param \AppBundle\Entity\GalleryCategory $galleryCategory
     */
    public function removeGalleryCategory(\AppBundle\Entity\GalleryCategory $galleryCategory)
    {
        $this->galleryCategory->removeElement($galleryCategory);
    }
}
