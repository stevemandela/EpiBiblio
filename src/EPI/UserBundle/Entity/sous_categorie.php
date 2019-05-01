<?php

namespace EPI\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * sous_categorie
 *
 * @ORM\Table(name="sous_categorie")
 * @ORM\Entity(repositoryClass="EPI\UserBundle\Repository\sous_categorieRepository")
 */
class sous_categorie
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
     * @ORM\Column(name="nom_souscat", type="string", length=255)
     */
    private $nomSouscat;

    /**
     * @ORM\ManyToOne(targetEntity="categorie")
     */
    private $categorie;

    /**
     * @ORM\OneToMany(targetEntity="livres", mappedBy="sous_categorie", cascade={"all"})
     */
    private $livres;

    /**
     * @ORM\OneToMany(targetEntity="demande", mappedBy="sous_categorie", cascade={"all"})
     */
    private $demande;

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
     * Set nomSouscat
     *
     * @param string $nomSouscat
     *
     * @return sous_categorie
     */
    public function setNomSouscat($nomSouscat)
    {
        $this->nomSouscat = $nomSouscat;

        return $this;
    }

    /**
     * Get nomSouscat
     *
     * @return string
     */
    public function getNomSouscat()
    {
        return $this->nomSouscat;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->livres = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set categorie
     *
     * @param \EPI\UserBundle\Entity\categorie $categorie
     *
     * @return sous_categorie
     */
    public function setCategorie(\EPI\UserBundle\Entity\categorie $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \EPI\UserBundle\Entity\categorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Add livre
     *
     * @param \EPI\UserBundle\Entity\livres $livre
     *
     * @return sous_categorie
     */
    public function addLivre(\EPI\UserBundle\Entity\livres $livre)
    {
        $this->livres[] = $livre;

        return $this;
    }

    /**
     * Remove livre
     *
     * @param \EPI\UserBundle\Entity\livres $livre
     */
    public function removeLivre(\EPI\UserBundle\Entity\livres $livre)
    {
        $this->livres->removeElement($livre);
    }

    /**
     * Get livres
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLivres()
    {
        return $this->livres;
    }

    public function __toString(){
       return (string)$this->nomSouscat;
    }



}
