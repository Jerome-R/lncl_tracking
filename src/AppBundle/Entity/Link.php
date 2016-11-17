<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

//To get access to the EntityManager and UnitOfWork APIs inside these callback methods.
use Doctrine\ORM\Event\LifecycleEventArgs;


use Application\Sonata\UserBundle\Entity\User;

/**
 * Link
 *
 * @ORM\Table(name="app_link")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\LinkRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Link
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
     * @ORM\Column(name="private_id", type="integer", unique=true,nullable=true)
     */
    private $privateId;

    /**
     * @var string
     *
     * @ORM\Column(name="idCampaignName", type="string", nullable=true)
     */
    private $idCampaignName;   

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", nullable=true)
     */
    private $url;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified_at", type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="update")
     */
    private $modifiedAt;

    public function __construct()
    {
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
     * Get privateId
     *
     * @return integer
     */
    public function getPrivateId()
    {
        return $this->privateId;
    }

    /**
     * Get privateId
     *
     * @return integer
     */
    public function setPrivateId($privateId)
    {
        $this->privateId = $privateId;
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
     * Get idCampaignName
     *
     * @return string
     */
    public function setIdCampaignName($idCampaignName)
    {
        $this->idCampaignName = $idCampaignName;
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
     * Set name
     *
     * @param string $name
     *
     * @return Campaign
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Campaign
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }


    // Function for sonata to render text-link relative to the entity

    /**
     * __toString
     * 
     * @return string
     */
    public function __toString() {
        return $this->getId().' - '.$this->getName(). ' - '.$this->getUrl();
    }


}
