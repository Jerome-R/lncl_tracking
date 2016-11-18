<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Tracking
 *
 * @ORM\Table(name="app_tracking")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\TrackingRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Tracking
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_client_interne", type="integer", nullable=true)
     */
    private $idClientInterne;


    /**
     * @var string
     *
     * @ORM\Column(name="id_campaign_name", type="string", length=255, nullable=true)
     */
    private $idCampaignName;  

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="user_ip", type="string", nullable=true)
     */
    private $userIp;

    /**
     * @var integer
     *
     * @ORM\Column(name="opens", type="integer", nullable=true)
     */
    private $opens;

    /**
     * @var boolean
     *
     * @ORM\Column(name="opens_once", type="boolean", nullable=true)
     */
    private $opensOnce;

    /**
     * @var integer
     *
     * @ORM\Column(name="clics", type="integer", nullable=true)
     */
    private $clics;

    /**
     * @var boolean
     *
     * @ORM\Column(name="clics_once", type="boolean", nullable=true)
     */
    private $clicsOnce;

    /**
     * @var integer
     *
     * @ORM\Column(name="forwards", type="integer", nullable=true)
     */
    private $forwards;

    /**
     * @var integer
     *
     * @ORM\Column(name="prints", type="integer", nullable=true)
     */
    private $prints;

    /**
     * @var boolean
     *
     * @ORM\Column(name="unsuscribe", type="boolean", nullable=true)
     */
    private $unsuscribe;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="contacted_at", type="datetime", nullable=true)
     */
    private $contactedAt;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\LinkClic", mappedBy="tracking", cascade={"persist", "remove"}, orphanRemoval=TRUE)
     */
    protected $linkClics;


    public function __construct()
    {   
        $this->opens        = 0;
        $this->opensOnce    = 0;
        $this->clics        = 0;
        $this->clicsOnce    = 0;
        $this->forwards     = 0;
        $this->prints       = 0;
        $this->unsuscribe   = 0;
        $this->linkClics    = new ArrayCollection();
    }


    /**
     * Get fullName
     *
     * @return \Tracking
     */
    public function getFullName()
    {
        return 'Tracking : '.$this->id.' - '.$this->idClient.' '.$this->idCampagne;
    }

    // Function for sonata to render text-link relative to the entity

    /**
     * __toString
     * 
     * @return string
     */
    public function __toString() {
        return $this->getFullName();
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
     * Set idCampaignName
     *
     * @param string $idCampaignName
     * @return Tracking
     */
    public function setIdCampaignName($idCampaignName)
    {
        $this->idCampaignName = $idCampaignName;

        return $this;
    }

    /**
     * Get idCampaignName
     *
     * @return string 
     */
    public function getIdCampaignName()
    {
        return $this->idCampaignName;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Tracking
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set userIp
     *
     * @param string $userIp
     * @return Tracking
     */
    public function setUserIp($userIp)
    {
        $this->userIp = $userIp;

        return $this;
    }

    /**
     * Get userIp
     *
     * @return string 
     */
    public function getUserIp()
    {
        return $this->userIp;
    }

    /**
     * Set opens
     *
     * @param integer $opens
     * @return Tracking
     */
    public function setOpens($opens)
    {
        $this->opens = $opens;

        return $this;
    }

    /**
     * Get opens
     *
     * @return integer 
     */
    public function getOpens()
    {
        return $this->opens;
    }

    /**
     * Set idClientInterne
     *
     * @param integer $idClientInterne
     * @return Tracking
     */
    public function setIdClientInterne($idClientInterne)
    {
        $this->idClientInterne = $idClientInterne;

        return $this;
    }

    /**
     * Get idClientInterne
     *
     * @return integer 
     */
    public function getIdClientInterne()
    {
        return $this->idClientInterne;
    }

    /**
     * Set opensOnce
     *
     * @param boolean $opensOnce
     * @return Tracking
     */
    public function setOpensOnce($opensOnce)
    {
        $this->opensOnce = $opensOnce;

        return $this;
    }

    /**
     * Get opensOnce
     *
     * @return boolean 
     */
    public function getOpensOnce()
    {
        return $this->opensOnce;
    }

    /**
     * Set clics
     *
     * @param integer $clics
     * @return Tracking
     */
    public function setClics($clics)
    {
        $this->clics = $clics;

        return $this;
    }

    /**
     * Get clics
     *
     * @return integer 
     */
    public function getClics()
    {
        return $this->clics;
    }

    /**
     * Set clicsOnce
     *
     * @param boolean $clicsOnce
     * @return Tracking
     */
    public function setClicsOnce($clicsOnce)
    {
        $this->clicsOnce = $clicsOnce;

        return $this;
    }

    /**
     * Get clicsOnce
     *
     * @return boolean 
     */
    public function getClicsOnce()
    {
        return $this->clicsOnce;
    }

    /**
     * Set forwards
     *
     * @param integer $forwards
     * @return Tracking
     */
    public function setForwards($forwards)
    {
        $this->forwards = $forwards;

        return $this;
    }

    /**
     * Get forwards
     *
     * @return integer 
     */
    public function getForwards()
    {
        return $this->forwards;
    }

    /**
     * Set prints
     *
     * @param integer $prints
     * @return Tracking
     */
    public function setPrints($prints)
    {
        $this->prints = $prints;

        return $this;
    }

    /**
     * Get prints
     *
     * @return integer 
     */
    public function getPrints()
    {
        return $this->prints;
    }

    /**
     * Set unsuscribe
     *
     * @param boolean $unsuscribe
     * @return Tracking
     */
    public function setUnsuscribe($unsuscribe)
    {
        $this->unsuscribe = $unsuscribe;

        return $this;
    }

    /**
     * Get unsuscribe
     *
     * @return boolean 
     */
    public function getUnsuscribe()
    {
        return $this->unsuscribe;
    }

    /**
     * Set contactedAt
     *
     * @param \DateTime $contactedAt
     *
     * @return Campaign
     */
    public function setContactedAt($contactedAt)
    {
        if( !($contactedAt instanceof \DateTime) ) $contactedAt = new \DateTime($contactedAt);
        $this->contactedAt = $contactedAt;

        return $this;
    }

    /**
     * Get contactedAt
     *
     * @return \DateTime
     */
    public function getContactedAt()
    {
        return $this->contactedAt;
    }

    public function addLinkClic(LinkClic $linkClic)
    {
        $this->linkClics[] = $linkClic;
        return $this;
    }

    public function removeLinkClic(LinkClic $linkClic)
    {
        $this->linkClics->removeElement($recipient);
    }

    public function getLinkClics()
    {
        return $this->linkClics;
    }
}