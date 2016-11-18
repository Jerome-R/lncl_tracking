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
 * @ORM\Table(name="app_link_clic")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\LinkRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class LinkClic
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Tracking", inversedBy="linkClics")
     * @ORM\JoinColumn(name="campaign_id", nullable=false)
     */
    private $tracking;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Link", inversedBy="linkClics")
     * @ORM\JoinColumn(name="client_id", nullable=false)
     */
    private $link;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_clics", type="integer", nullable=true)
     */
    private $nbClics;

    public function __construct()
    {
        $this->nbClics      = 0;
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

    public function getLink()
    {
        return $this->link;
    }

    public function setLink(Link $link = null)
    {
        $this->link = $link;
        return $this;
    }

    public function getTracking()
    {
        return $this->tracking;
    }

    public function setTracking(Tracking $tracking = null)
    {
        $this->tracking = $tracking;
        return $this;
    }

    /**
     * Get nbClics
     *
     * @return integer
     */
    public function getNbClics()
    {
        return $this->nbClics;
    }

    /**
     * Get nbClics
     *
     * @return integer
     */
    public function setNbClics($nbClics)
    {
        $this->nbClics = $nbClics;
        return $this;
    }

    

}
