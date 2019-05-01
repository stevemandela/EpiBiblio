<?php

namespace EPI\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="EPI\UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255)
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=255)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="motPasse", type="string", length=255)
     */
    private $motPasse;

    /**
     * @var string
     *
     * @ORM\Column(name="etatCompte", type="string", length=255)
     */
    private $etatCompte;

    /**
     * @var string
     *
     * @ORM\Column(name="typeUser", type="string", length=255)
     */
    private $typeUser;

    /**
     * @ORM\OneToMany(targetEntity="demande", mappedBy="user", cascade={"all"})
     */
    private $demande;

    /**
     * @ORM\OneToMany(targetEntity="messages", mappedBy="user", cascade={"all"})
     */
    private $messages;

    /**
     * @ORM\OneToMany(targetEntity="status", mappedBy="user", cascade={"all"})
     */
    private $status;


    /**
     * @ORM\OneToMany(targetEntity="commentaires", mappedBy="user", cascade={"all"})
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
     * Set nom
     *
     * @param string $nom
     *
     * @return User
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return User
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set login
     *
     * @param string $login
     *
     * @return User
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set motPasse
     *
     * @param string $motPasse
     *
     * @return User
     */
    public function setMotPasse($motPasse)
    {
        $this->motPasse = $motPasse;

        return $this;
    }

    /**
     * Get motPasse
     *
     * @return string
     */
    public function getMotPasse()
    {
        return $this->motPasse;
    }

    /**
     * Set etatCompte
     *
     * @param string $etatCompte
     *
     * @return User
     */
    public function setEtatCompte($etatCompte)
    {
        $this->etatCompte = $etatCompte;

        return $this;
    }

    /**
     * Get etatCompte
     *
     * @return string
     */
    public function getEtatCompte()
    {
        return $this->etatCompte;
    }

    /**
     * Set typeUser
     *
     * @param string $typeUser
     *
     * @return User
     */
    public function setTypeUser($typeUser)
    {
        $this->typeUser = $typeUser;

        return $this;
    }

    /**
     * Get typeUser
     *
     * @return string
     */
    public function getTypeUser()
    {
        return $this->typeUser;
    }

    /**
     * Add demande
     *
     * @param \EPI\UserBundle\Entity\demande $demande
     *
     * @return User
     */
    public function addDemande(\EPI\UserBundle\Entity\demande $demande)
    {
        $this->demande[] = $demande;

        return $this;
    }

    /**
     * Remove demande
     *
     * @param \EPI\UserBundle\Entity\demande $demande
     */
    public function removeDemande(\EPI\UserBundle\Entity\demande $demande)
    {
        $this->demande->removeElement($demande);
    }

    /**
     * Get demande
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDemande()
    {
        return $this->demande;
    }

    /**
     * Add message
     *
     * @param \EPI\UserBundle\Entity\messages $message
     *
     * @return User
     */
    public function addMessage(\EPI\UserBundle\Entity\messages $message)
    {
        $this->messages[] = $message;

        return $this;
    }

    /**
     * Remove message
     *
     * @param \EPI\UserBundle\Entity\messages $message
     */
    public function removeMessage(\EPI\UserBundle\Entity\messages $message)
    {
        $this->messages->removeElement($message);
    }

    /**
     * Get messages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * Add status
     *
     * @param \EPI\UserBundle\Entity\status $status
     *
     * @return User
     */
    public function addStatus(\EPI\UserBundle\Entity\status $status)
    {
        $this->status[] = $status;

        return $this;
    }

    /**
     * Remove status
     *
     * @param \EPI\UserBundle\Entity\status $status
     */
    public function removeStatus(\EPI\UserBundle\Entity\status $status)
    {
        $this->status->removeElement($status);
    }

    /**
     * Get status
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Add commentaire
     *
     * @param \EPI\UserBundle\Entity\commentaires $commentaire
     *
     * @return User
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
