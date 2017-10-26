<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GalleryCategory
 *
 * @ORM\Table(name="gallery_category")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GalleryCategoryRepository")
 */
class GalleryCategory
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
     * @ORM\Column(name="category", type="string", length=255)
     */
    private $category;

     /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\MainGallery", mappedBy="galleryCategory")
     */
    private $mainCategory;
    
    
    
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
    
    
     public function __construct()
    {
       
        $this->maincategory = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set category
     *
     * @param string $category
     *
     * @return GalleryCategory
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
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
     * @return GalleryCategory
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
     * @return GalleryCategory
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
     * Add maincategory
     *
     * @param \AppBundle\Entity\MainGallery $maincategory
     *
     * @return GalleryCategory
     */
    public function addMaincategory(\AppBundle\Entity\MainGallery $maincategory)
    {
        $this->maincategory[] = $maincategory;

        return $this;
    }

    /**
     * Remove maincategory
     *
     * @param \AppBundle\Entity\MainGallery $maincategory
     */
    public function removeMaincategory(\AppBundle\Entity\MainGallery $maincategory)
    {
        $this->maincategory->removeElement($maincategory);
    }

    /**
     * Get maincategory
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMaincategory()
    {
        return $this->maincategory;
    }
}
