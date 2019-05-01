<?php

namespace EPI\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * commentaires
 *
 * @ORM\Table(name="commentaires")
 * @ORM\Entity(repositoryClass="EPI\UserBundle\Repository\commentairesRepository")
 */
class commentaires
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
     * @ORM\Column(name="commentaire", type="text")
     */
    private $commentaire;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_commentaire", type="date")
     */
    private $dateCommentaire;


    /**
     * @ORM\ManyToOne(targetEntity="user")
     */
    private $User;

    /**
     * @ORM\ManyToOne(targetEntity="EPI\UserBundle\Entity\livres",cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $livres;


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
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return commentaires
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set dateCommentaire
     *
     * @param \DateTime $dateCommentaire
     *
     * @return commentaires
     */
    public function setDateCommentaire($dateCommentaire)
    {
        $this->dateCommentaire = $dateCommentaire;

        return $this;
    }

    /**
     * Get dateCommentaire
     *
     * @return \DateTime
     */
    public function getDateCommentaire()
    {
        return $this->dateCommentaire;
    }

    /**
     * Set tempsCommentaire
     *
     * @param \DateTime $tempsCommentaire
     *
     * @return commentaires
     */
    public function setTempsCommentaire($tempsCommentaire)
    {
        $this->tempsCommentaire = $tempsCommentaire;

        return $this;
    }

    /**
     * Get tempsCommentaire
     *
     * @return \DateTime
     */
    public function getTempsCommentaire()
    {
        return $this->tempsCommentaire;
    }

    /**
     * Set user
     *
     * @param \EPI\UserBundle\Entity\user $user
     *
     * @return commentaires
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

    /**
     * Set status
     *
     * @param \EPI\UserBundle\Entity\status $status
     *
     * @return commentaires
     */
    public function setStatus(\EPI\UserBundle\Entity\status $status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \EPI\UserBundle\Entity\status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set livres
     *
     * @param \EPI\UserBundle\Entity\livres $livres
     *
     * @return commentaires
     */
    public function setLivres(\EPI\UserBundle\Entity\livres $livres)
    {
        $this->livres = $livres;

        return $this;
    }

    /**
     * Get livres
     *
     * @return \EPI\UserBundle\Entity\livres
     */
    public function getLivres()
    {
        return $this->livres;
    }
}
