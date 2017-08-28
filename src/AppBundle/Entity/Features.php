<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
}
