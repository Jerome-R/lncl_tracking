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
     * @var string
     *
     * @ORM\Column(name="campagne", type="string", length=255)
     */
    private $campagne;

    /**
     * @var integer
     *
     * @ORM\Column(name="hard_bounce", type="integer")
     */
    private $hardBounce;

    /**
     * @var integer
     *
     * @ORM\Column(name="soft_bounce", type="integer")
     */
    private $softBounce;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ouvreur_unique", type="boolean")
     */
    private $ouvreurUnique;

    /**
     * @var integer
     *
     * @ORM\Column(name="ouvertures", type="integer")
     */
    private $ouvertures;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cliqueur_unique", type="boolean")
     */
    private $cliqueurUnique;

    /**
     * @var integer
     *
     * @ORM\Column(name="clics", type="integer")
     */
    private $clics;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified_at", type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="update")
     */
    private $modifiedAt;


    public function __construct()
    {
        $this->createdAt    = new \DateTime();
    }

    /**
     * Get fullName
     *
     * @return \Client
     */
    public function getFullName()
    {
        return $this->campagne;
    }

    // Function for sonata to render text-link relative to the entity

    /**
     * __toString
     * 
     * @return string
     */
    public function __toString() {
        return $this->campagne();
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
     * Get question1
     *
     * @return integer
     */
    public function getQuestion1()
    {
        return $this->question1;
    }

    /**
     * Set question1
     *
     * @return Tracking
     */
    public function setQuestion1($question1)
    {
        $this->question1 = $question1;

        return $this;
    }

    /**
     * Get question2
     *
     * @return integer
     */
    public function getQuestion2()
    {
        return $this->question2;
    }

    /**
     * Set question2
     *
     * @return Tracking
     */
    public function setQuestion2($question2)
    {
        $this->question2 = $question2;

        return $this;
    }

    /**
     * Get question3
     *
     * @return integer
     */
    public function getQuestion3()
    {
        return $this->question3;
    }

    /**
     * Set question3
     *
     * @return Tracking
     */
    public function setQuestion3($question3)
    {
        $this->question3 = $question3;

        return $this;
    }

    /**
     * Get question4
     *
     * @return integer
     */
    public function getQuestion4()
    {
        return $this->question4;
    }

    /**
     * Set question4
     *
     * @return Tracking
     */
    public function setQuestion4($question4)
    {
        $this->question4 = $question4;

        return $this;
    }

    /**
     * Get question5
     *
     * @return integer
     */
    public function getQuestion5()
    {
        return $this->question5;
    }

    /**
     * Set question5
     *
     * @return Tracking
     */
    public function setQuestion5($question5)
    {
        $this->question5 = $question5;

        return $this;
    }

    /**
     * Get question1
     *
     * @return text
     */
    public function getCommentaire1()
    {
        return $this->commentaire1;
    }

    /**
     * Set commentaire1
     *
     * @return Tracking
     */
    public function setCommentaire1($commentaire1)
    {
        $this->commentaire1 = $commentaire1;

        return $this;
    }

    /**
     * Get commentaire2
     *
     * @return text
     */
    public function getCommentaire2()
    {
        return $this->commentaire2;
    }

    /**
     * Set commentaire2
     *
     * @return Tracking
     */
    public function setCommentaire2($commentaire2)
    {
        $this->commentaire2 = $commentaire2;

        return $this;
    }

    /**
     * Get commentaire3
     *
     * @return text
     */
    public function getCommentaire3()
    {
        return $this->commentaire3;
    }

    /**
     * Set commentaire3
     *
     * @return Tracking
     */
    public function setCommentaire3($commentaire3)
    {
        $this->commentaire3 = $commentaire3;

        return $this;
    }

    /**
     * Get commentaire4
     *
     * @return text
     */
    public function getCommentaire4()
    {
        return $this->commentaire4;
    }

    /**
     * Set commentaire4
     *
     * @return Tracking
     */
    public function setCommentaire4($commentaire4)
    {
        $this->commentaire4 = $commentaire4;

        return $this;
    }

    /**
     * Get commentaire5
     *
     * @return text
     */
    public function getCommentaire5()
    {
        return $this->commentaire5;
    }

    /**
     * Set commentaire5
     *
     * @return Tracking
     */
    public function setCommentaire5($commentaire5)
    {
        $this->commentaire5 = $commentaire5;

        return $this;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Tracking
     */
    public function setCreatedAt($createdAt)
    {
        if( !($createdAt instanceof \DateTime) ) $createdAt = new \DateTime($createdAt);
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set modifiedAt
     *
     * @param \DateTime $modifiedAt
     *
     * @return Tracking
     */
    public function setModifiedAt($modifiedAt)
    {
        if( !($modifiedAt instanceof \DateTime) ) $modifiedAt = new \DateTime($modifiedAt);
        $this->modifiedAt = $modifiedAt;

        return $this;
    }

    /**
     * Get modifiedAt
     *
     * @return \DateTime
     */
    public function getModifiedAt()
    {
        return $this->modifiedAt;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updateModifiedAt()
    {
        $this->modifiedAt = new \DateTime();
        return $this;
    }

    
}
