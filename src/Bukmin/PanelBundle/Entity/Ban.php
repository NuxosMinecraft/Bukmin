<?php

//TODO : validation

namespace Bukmin\PanelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Bukmin\PanelBundle\Entity\Ban
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Bukmin\PanelBundle\Entity\BanRepository")
 */
class Ban
{
    public function __construct()
    {
        $this->expire = new \Datetime();
        $this->active = true;
    }
    
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var text $reason
     *
     * @ORM\Column(name="reason", type="text")
     * @Assert\NotBlank
     */
    private $reason;

    /**
     * @var datetime $expire
     *
     * @ORM\Column(name="expire", type="datetime")
     * @Assert\DateTime
     */
    private $expire;

    /**
     * @var boolean $active
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * @var string $player
     *
     * @ORM\ManyToOne(targetEntity="Bukmin\PanelBundle\Entity\Player")
     */
    private $player;


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
     * Set reason
     *
     * @param text $reason
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
    }

    /**
     * Get reason
     *
     * @return text 
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Set expire
     *
     * @param datetime $expire
     */
    public function setExpire($expire)
    {
        $this->expire = $expire;
    }

    /**
     * Get expire
     *
     * @return datetime 
     */
    public function getExpire()
    {
        return $this->expire;
    }

    /**
     * Set active
     *
     * @param boolean $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set player
     *
     * @param string $player
     */
    public function setPlayer(\Bukmin\PanelBundle\Entity\Player $player)
    {
        $this->player = $player;
    }

    /**
     * Get player
     *
     * @return string 
     */
    public function getPlayer()
    {
        return $this->player;
    }
}