<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BreadCrumps
 *
 * @ORM\Table(name="bread_crumps")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BreadCrumpsRepository")
 */
class BreadCrumps
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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\MainGallery", mappedBy="breadCrumps")
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
     * Set name
     *
     * @param string $name
     *
     * @return BreadCrumps
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
     * Constructor
     */
    public function __construct()
    {
        $this->mainGallery = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add mainGallery
     *
     * @param \AppBundle\Entity\MainGallery $mainGallery
     *
     * @return BreadCrumps
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
