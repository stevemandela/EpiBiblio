<?php

namespace EPI\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * categorie
 *
 * @ORM\Table(name="categorie")
 * @ORM\Entity(repositoryClass="EPI\UserBundle\Repository\categorieRepository")
 */
class categorie
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
     * @ORM\Column(name="nom_categorie", type="string", length=255)
     */
    private $nomCategorie;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="sous_categorie", mappedBy="categorie", cascade={"all"})
     */
    private $sous_categorie;

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
     * Set nomCategorie
     *
     * @param string $nomCategorie
     *
     * @return categorie
     */
    public function setNomCategorie($nomCategorie)
    {
        $this->nomCategorie = $nomCategorie;

        return $this;
    }

    /**
     * Get nomCategorie
     *
     * @return string
     */
    public function getNomCategorie()
    {
        return $this->nomCategorie;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return categorie
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
     * Constructor
     */
    public function __construct()
    {
        $this->sous_categorie = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add sousCategorie
     *
     * @param \EPI\UserBundle\Entity\sous_categorie $sousCategorie
     *
     * @return categorie
     */
    public function addSousCategorie(\EPI\UserBundle\Entity\sous_categorie $sousCategorie)
    {
        $this->sous_categorie[] = $sousCategorie;

        return $this;
    }

    /**
     * Remove sousCategorie
     *
     * @param \EPI\UserBundle\Entity\sous_categorie $sousCategorie
     */
    public function removeSousCategorie(\EPI\UserBundle\Entity\sous_categorie $sousCategorie)
    {
        $this->sous_categorie->removeElement($sousCategorie);
    }

    /**
     * Get sousCategorie
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSousCategorie()
    {
        return $this->sous_categorie;
    }

    public function __toString(){
       return $this->description;
    }
}
