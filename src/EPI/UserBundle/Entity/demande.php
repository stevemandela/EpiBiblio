<?php

namespace EPI\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * demande
 *
 * @ORM\Table(name="demande")
 * @ORM\Entity(repositoryClass="EPI\UserBundle\Repository\demandeRepository")
 */
class demande
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
     * @ORM\Column(name="titre_livre", type="string", length=255)
     */
    private $titreLivre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_demande", type="datetime")
     */
    private $dateDemande;
    
    /**
     * @ORM\ManyToOne(targetEntity="sous_categorie")
     */
    private $sous_categorie;


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
     * Set titreLivre
     *
     * @param string $titreLivre
     *
     * @return demande
     */
    public function setTitreLivre($titreLivre)
    {
        $this->titreLivre = $titreLivre;

        return $this;
    }

    /**
     * Get titreLivre
     *
     * @return string
     */
    public function getTitreLivre()
    {
        return $this->titreLivre;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return demande
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set dateDemande
     *
     * @param \DateTime $dateDemande
     *
     * @return demande
     */
    public function setDateDemande($dateDemande)
    {
        $this->dateDemande = $dateDemande;

        return $this;
    }

    /**
     * Get dateDemande
     *
     * @return \DateTime
     */
    public function getDateDemande()
    {
        return $this->dateDemande;
    }

    /**
     * Set sousCategorie
     *
     * @param \EPI\UserBundle\Entity\sous_categorie $sousCategorie
     *
     * @return demande
     */
    public function setSousCategorie(\EPI\UserBundle\Entity\sous_categorie $sousCategorie = null)
    {
        $this->sous_categorie = $sousCategorie;

        return $this;
    }

    /**
     * Get sousCategorie
     *
     * @return \EPI\UserBundle\Entity\sous_categorie
     */
    public function getSousCategorie()
    {
        return $this->sous_categorie;
    }

    /**
     * Set user
     *
     * @param \EPI\UserBundle\Entity\user $user
     *
     * @return demande
     */
    public function setUser(\EPI\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

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
