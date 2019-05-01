<?php

namespace EPI\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * livres
 *
 * @ORM\Table(name="livres")
 * @ORM\Entity(repositoryClass="EPI\UserBundle\Repository\livresRepository")
 */
class livres
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
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Please, upload the livres image as a PNG image.")
     * @Assert\File(mimeTypes={ "image/jpeg" })
     */
    private $image;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="datetime")
     */
    private $dateCreation;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreVue", type="string", length=255)
     */
    private $nombreVue;

    /**
     * @var int
     *
     * @ORM\Column(name="nombre_telechargement", type="integer")
     */
    private $nombreTelechargement;

    /**
     * @ORM\ManyToOne(targetEntity="sous_categorie")
     */
    private $sous_categorie;

    /**
     * @ORM\OneToMany(targetEntity="status", mappedBy="livres", cascade={"all"})
     */
    private $status;


     /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Please, upload the livres brochure as a PDF file.")
     * @Assert\File(mimeTypes={ "application/pdf" })
     */


    private $brochure;

  

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
     * Set image
     *
     * @param string $image
     *
     * @return livres
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return livres
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set nombreVue
     *
     * @param string $nombreVue
     *
     * @return livres
     */
    public function setNombreVue($nombreVue)
    {
        $this->nombreVue = $nombreVue;

        return $this;
    }

    /**
     * Get nombreVue
     *
     * @return string
     */
    public function getNombreVue()
    {
        return $this->nombreVue;
    }

    /**
     * Set nombreTelechargement
     *
     * @param integer $nombreTelechargement
     *
     * @return livres
     */
    public function setNombreTelechargement($nombreTelechargement)
    {
        $this->nombreTelechargement = $nombreTelechargement;

        return $this;
    }

    /**
     * Get nombreTelechargement
     *
     * @return int
     */
    public function getNombreTelechargement()
    {
        return $this->nombreTelechargement;
    }

    /**
     * Set cheminUrl
     *
     * @param string $cheminUrl
     *
     * @return livres
     */
    public function setCheminUrl($cheminUrl)
    {
        $this->cheminUrl = $cheminUrl;

        return $this;
    }

    /**
     * Get cheminUrl
     *
     * @return string
     */
    public function getCheminUrl()
    {
        return $this->cheminUrl;
    }

    /**
     * Set sousCategorie
     *
     * @param \EPI\UserBundle\Entity\sous_categorie $sousCategorie
     *
     * @return livres
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
     * Constructor
     */
    public function __construct()
    {
        $this->status = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add status
     *
     * @param \EPI\UserBundle\Entity\status $status
     *
     * @return livres
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

      public function __toString(){
       return $this->sous_categorie;
    }
    

    public function getBrochure()
    {
        return $this->brochure;
    }

    public function setBrochure($brochure)
    {
        $this->brochure = $brochure;

        return $this;
    }

}
