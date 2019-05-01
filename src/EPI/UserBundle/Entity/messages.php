<?php

namespace EPI\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * messages
 *
 * @ORM\Table(name="messages")
 * @ORM\Entity(repositoryClass="EPI\UserBundle\Repository\messagesRepository")
 */
class messages
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
     * @ORM\Column(name="message", type="text")
     */
    private $message;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_message", type="date")
     */
    private $dateMessage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="temps_message", type="time")
     */
    private $tempsMessage;

    /**
     * @var string
     *
     * @ORM\Column(name="piece_jointe", type="text")
     */
    private $pieceJointe;

    /**
     * @var int
     *
     * @ORM\Column(name="etat", type="integer")
     */
    private $etat;

    
    /**
     * @ORM\ManyToOne(targetEntity="user")
     */
    private $User;

    
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
     * Set message
     *
     * @param string $message
     *
     * @return messages
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set dateMessage
     *
     * @param \DateTime $dateMessage
     *
     * @return messages
     */
    public function setDateMessage($dateMessage)
    {
        $this->dateMessage = $dateMessage;

        return $this;
    }

    /**
     * Get dateMessage
     *
     * @return \DateTime
     */
    public function getDateMessage()
    {
        return $this->dateMessage;
    }

    /**
     * Set tempsMessage
     *
     * @param \DateTime $tempsMessage
     *
     * @return messages
     */
    public function setTempsMessage($tempsMessage)
    {
        $this->tempsMessage = $tempsMessage;

        return $this;
    }

    /**
     * Get tempsMessage
     *
     * @return \DateTime
     */
    public function getTempsMessage()
    {
        return $this->tempsMessage;
    }

    /**
     * Set pieceJointe
     *
     * @param string $pieceJointe
     *
     * @return messages
     */
    public function setPieceJointe($pieceJointe)
    {
        $this->pieceJointe = $pieceJointe;

        return $this;
    }

    /**
     * Get pieceJointe
     *
     * @return string
     */
    public function getPieceJointe()
    {
        return $this->pieceJointe;
    }

    /**
     * Set etat
     *
     * @param integer $etat
     *
     * @return messages
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return int
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set user
     *
     * @param \EPI\UserBundle\Entity\user $user
     *
     * @return messages
     */
    public function setUser(\EPI\UserBundle\Entity\user $user = null)
    {
        $this->User = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \EPI\UserBundle\Entity\user
     */
    public function getUser()
    {
        return $this->User;
    }
}
