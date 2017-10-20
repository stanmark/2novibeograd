<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;


/**
 * HomeSlider
 *
 * @ORM\Table(name="home_slider")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\HomeSliderRepository")
 * @Vich\Uploadable
 * @ORM\HasLifecycleCallbacks
 */
class HomeSlider
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
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;
    
    /**
     * @Vich\UploadableField(mapping="user_upload", fileNameProperty="image")
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
     * @var string
     *
     * @ORM\Column(name="MainTitle", type="string", length=255)
     */
    private $mainTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="SubTitle", type="string", length=255)
     */
    private $subTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="SubTitleDescription", type="string", length=255)
     */
    private $subTitleDescription;
    
    /**
     * @var string
     *
     * @ORM\Column(name="CallToActionLink", type="string", length=255)
     */
    
    private $CallToActionLink;
    
    /**
     * @var string
     *
     * @ORM\Column(name="CallToActionButton", type="string", length=255)
     */
    
    private $CallToActionButton;


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
    protected $updatedAt;
    
    
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
        $this->updatedAt = new \DateTime("now");
    }
   

    /**
     * Set image
     *
     * @param string $image
     *
     * @return HomeSlider
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set alt
     *
     * @param string $alt
     *
     * @return HomeSlider
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
     * Set mainTitle
     *
     * @param string $mainTitle
     *
     * @return HomeSlider
     */
    public function setMainTitle($mainTitle)
    {
        $this->mainTitle = $mainTitle;

        return $this;
    }

    /**
     * Get mainTitle
     *
     * @return string
     */
    public function getMainTitle()
    {
        return $this->mainTitle;
    }

    /**
     * Set subTitle
     *
     * @param string $subTitle
     *
     * @return HomeSlider
     */
    public function setSubTitle($subTitle)
    {
        $this->subTitle = $subTitle;

        return $this;
    }

    /**
     * Get subTitle
     *
     * @return string
     */
    public function getSubTitle()
    {
        return $this->subTitle;
    }

    /**
     * Set subTitleDescription
     *
     * @param string $subTitleDescription
     *
     * @return HomeSlider
     */
    public function setSubTitleDescription($subTitleDescription)
    {
        $this->subTitleDescription = $subTitleDescription;

        return $this;
    }

    /**
     * Get subTitleDescription
     *
     * @return string
     */
    public function getSubTitleDescription()
    {
        return $this->subTitleDescription;
    }

    /**
     * Set callToActionLink
     *
     * @param string $callToActionLink
     *
     * @return HomeSlider
     */
    public function setCallToActionLink($callToActionLink)
    {
        $this->CallToActionLink = $callToActionLink;

        return $this;
    }

    /**
     * Get callToActionLink
     *
     * @return string
     */
    public function getCallToActionLink()
    {
        return $this->CallToActionLink;
    }

    /**
     * Set callToActionButton
     *
     * @param string $callToActionButton
     *
     * @return HomeSlider
     */
    public function setCallToActionButton($callToActionButton)
    {
        $this->CallToActionButton = $callToActionButton;

        return $this;
    }

    /**
     * Get callToActionButton
     *
     * @return string
     */
    public function getCallToActionButton()
    {
        return $this->CallToActionButton;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return HomeSlider
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
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return HomeSlider
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
    
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;
        
        return $this;
    }
    
    
    
    public function getImageFile()
    {
        return $this->imageFile;
    }
}
