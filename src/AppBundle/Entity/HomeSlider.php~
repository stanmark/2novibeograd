<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;



/**
 * HomeSlider
 *
 * @ORM\Table(name="home_slider")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\HomeSliderRepository")
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
     * @ORM\Column(name="MainTitle", type="string", length=255)
     */
    private $mainTitle;
    
    
      /**
     * @Gedmo\Slug(fields={"mainTitle"})
     * @ORM\Column(type="string", unique=true)
     */
    private $slug;

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
    protected $updated;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\MainGallery", mappedBy="homeSlider")
     */
    private $mainGallery;
    
    
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
        $this->updated = new \DateTime("now");
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
     * Constructor
     */
    public function __construct()
    {
        $this->mainGallery = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     *
     * @return HomeSlider
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
     * @return HomeSlider
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
     * Set slug
     *
     * @param string $slug
     *
     * @return HomeSlider
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
}
