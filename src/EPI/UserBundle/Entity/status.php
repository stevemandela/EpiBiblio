<?php

namespace EPI\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * status
 *
 * @ORM\Table(name="status")
 * @ORM\Entity(repositoryClass="EPI\UserBundle\Repository\statusRepository")
 */
class status
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
     * @ORM\Column(name="publications", type="string", length=255)
     */
    private $publications;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_status", type="date")
     */
    private $dateStatus;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="temps_status", type="time")
     */
    private $tempsStatus;

    /**
     * @ORM\ManyToOne(targetEntity="user")
     */
    private $User;

    /**
     * @ORM\ManyToOne(targetEntity="livres")
     */
    private $livres;


    /**
     * @ORM\OneToMany(targetEntity="commentaires", mappedBy="status", cascade={"all"})
     */
    private $commentaires;



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
     * Set publications
     *
     * @param string $publications
     *
     * @return status
     */
    public function setPublications($publications)
    {
        $this->publications = $publications;

        return $this;
    }

    /**
     * Get publications
     *
     * @return string
     */
    public function getPublications()
    {
        return $this->publications;
    }

    /**
     * Set dateStatus
     *
     * @param \DateTime $dateStatus
     *
     * @return status
     */
    public function setDateStatus($dateStatus)
    {
        $this->dateStatus = $dateStatus;

        return $this;
    }

    /**
     * Get dateStatus
     *
     * @return \DateTime
     */
    public function getDateStatus()
    {
        return $this->dateStatus;
    }

    /**
     * Set tempsStatus
     *
     * @param \DateTime $tempsStatus
     *
     * @return status
     */
    public function setTempsStatus($tempsStatus)
    {
        $this->tempsStatus = $tempsStatus;

        return $this;
    }

    /**
     * Get tempsStatus
     *
     * @return \DateTime
     */
    public function getTempsStatus()
    {
        return $this->tempsStatus;
    }

    /**
     * Set user
     *
     * @param \EPI\UserBundle\Entity\user $user
     *
     * @return status
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
     * Set livres
     *
     * @param \EPI\UserBundle\Entity\livres $livres
     *
     * @return status
     */
    public function setLivres(\EPI\UserBundle\Entity\livres $livres = null)
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->commentaires = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add commentaire
     *
     * @param \EPI\UserBundle\Entity\commentaires $commentaire
     *
     * @return status
     */
    public function addCommentaire(\EPI\UserBundle\Entity\commentaires $commentaire)
    {
        $this->commentaires[] = $commentaire;

        return $this;
    }

    /**
     * Remove commentaire
     *
     * @param \EPI\UserBundle\Entity\commentaires $commentaire
     */
    public function removeCommentaire(\EPI\UserBundle\Entity\commentaires $commentaire)
    {
        $this->commentaires->removeElement($commentaire);
    }

    /**
     * Get commentaires
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommentaires()
    {
        return $this->commentaires;
    }
}
