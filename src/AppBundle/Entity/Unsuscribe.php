<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Unsuscribe
 *
 * @ORM\Table(name="app_unsuscribe")
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks()
 */
class Unsuscribe
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
     * @var string
     *
     * @ORM\Column(name="id_campaign_name", type="string", length=255, unique=true, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="raison", type="string", length=255, nullable=true)
     */
    private $raison;

   /**
     * @var \DateTime
     *
     * @ORM\Column(name="unsuscribe_date", type="datetime", nullable=true)
     */
    private $unsuscribeDate;

    public function __construct()
    {   
        $this->unsuscribeDate       = new \DateTime();
    }


    /**
     * Get fullName
     *
     * @return \Tracking
     */
    public function getFullName()
    {
        return 'Tracking : '.$this->id.' - '.$this->email;
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

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getRaison()
    {
        return $this->raison;
    }

    public function setRaison($raison)
    {
        $this->raison = $raison;
        return $this;
    }

    /**
     * Set unsuscribeDate
     *
     * @param \DateTime $unsuscribeDate
     *
     * @return Campaign
     */
    public function setUnsuscribeDate($unsuscribeDate)
    {
        if( !($unsuscribeDate instanceof \DateTime) ) $unsuscribeDate = new \DateTime($unsuscribeDate);
        $this->unsuscribeDate = $unsuscribeDate;

        return $this;
    }

    /**
     * Get unsuscribeDate
     *
     * @return \DateTime
     */
    public function getUnsuscribeDate()
    {
        return $this->unsuscribeDate;
    }
    
}