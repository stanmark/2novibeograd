<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Features
 *
 * @ORM\Table(name="features")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FeaturesRepository")
 */
class Features
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
     * @ORM\Column(name="features", type="string", length=255)
     */
    private $features;
    
    
      /**
     * @Gedmo\Slug(fields={"features"})
     * @ORM\Column(type="string", unique=true)
     */
    private $slug;

    
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Pricing", mappedBy="features")
     */
    private $pricing;

    
    
    public function __construct()
    {
        $this->pricing = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set features
     *
     * @param string $features
     *
     * @return Features
     */
    public function setFeatures($features)
    {
        $this->features = $features;

        return $this;
    }

    /**
     * Get features
     *
     * @return string
     */
    public function getFeatures()
    {
        return $this->features;
    }

    /**
     * Add pricing
     *
     * @param \AppBundle\Entity\Pricing $pricing
     *
     * @return Features
     */
    public function addPricing(\AppBundle\Entity\Pricing $pricing)
    {
        $this->pricing[] = $pricing;

        return $this;
    }

    /**
     * Remove pricing
     *
     * @param \AppBundle\Entity\Pricing $pricing
     */
    public function removePricing(\AppBundle\Entity\Pricing $pricing)
    {
        $this->pricing->removeElement($pricing);
    }

    /**
     * Get pricing
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPricing()
    {
        return $this->pricing;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Features
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
