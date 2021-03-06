<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Company
 *
 * @ORM\Table(name="company")
 * @ORM\Entity
 */
class Company
{
    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=255, nullable=false)
     */
    private $name;
    
     /**
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(type="string", unique=true)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="adress", type="string", length=255, nullable=false)
     */
    private $adress;
    
    /**
     * @var string
     *
     * @ORM\Column(name="Phone", type="string", length=255, nullable=false)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255, nullable=false)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=false)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="faceurl", type="string", length=255, nullable=false)
     */
    private $faceurl;   

    /**
     * @var string
     *
     * @ORM\Column(name="gurl", type="string", length=255, nullable=false)
     */
    private $gurl;  
    
     /**
     * @var string
     *
     * @ORM\Column(name="instagram", type="string", length=255, nullable=false)
     */
    private $instagram;  

    /**
     * @var integer
     *
     * @ORM\Column(name="pib", type="integer", nullable=false)
     */
    private $pib;

    /**
     * @var integer
     *
     * @ORM\Column(name="matnumber", type="integer", nullable=false)
     */
    private $matnumber;

    /**
     * @var integer
     *
     * @ORM\Column(name="bankacount", type="string", length=255, nullable=false)
     */
    private $bankacount;

    /**
     * @var integer
     *
     * @ORM\Column(name="bank", type="string", length=255, nullable=false)
     */
    private $bank;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;



    /**
     * Set name
     *
     * @param string $name
     *
     * @return Company
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
     * Set adress
     *
     * @param string $adress
     *
     * @return Company
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
     * Set city
     *
     * @param string $city
     *
     * @return Company
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set faceurl
     *
     * @param string $faceurl
     *
     * @return Company
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
     * @return Company
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
     * Set pib
     *
     * @param integer $pib
     *
     * @return Company
     */
    public function setPib($pib)
    {
        $this->pib = $pib;

        return $this;
    }

    /**
     * Get pib
     *
     * @return integer
     */
    public function getPib()
    {
        return $this->pib;
    }

    /**
     * Set matnumber
     *
     * @param integer $matnumber
     *
     * @return Company
     */
    public function setMatnumber($matnumber)
    {
        $this->matnumber = $matnumber;

        return $this;
    }

    /**
     * Get matnumber
     *
     * @return integer
     */
    public function getMatnumber()
    {
        return $this->matnumber;
    }

    /**
     * Set bankacount
     *
     * @param integer $bankacount
     *
     * @return Company
     */
    public function setBankacount($bankacount)
    {
        $this->bankacount = $bankacount;

        return $this;
    }

    /**
     * Get bankacount
     *
     * @return integer
     */
    public function getBankacount()
    {
        return $this->bankacount;
    }

    /**
     * Set bank
     *
     * @param integer $bank
     *
     * @return Company
     */
    public function setBank($bank)
    {
        $this->bank = $bank;

        return $this;
    }

    /**
     * Get bank
     *
     * @return integer
     */
    public function getBank()
    {
        return $this->bank;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Company
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
     * @return Company
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
     * Set description
     *
     * @param string $description
     *
     * @return Company
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
     * Set slug
     *
     * @param string $slug
     *
     * @return Company
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

    /**
     * Set instagram
     *
     * @param string $instagram
     *
     * @return Company
     */
    public function setInstagram($instagram)
    {
        $this->instagram = $instagram;

        return $this;
    }

    /**
     * Get instagram
     *
     * @return string
     */
    public function getInstagram()
    {
        return $this->instagram;
    }
}
