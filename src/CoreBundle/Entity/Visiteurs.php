<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Visiteurs
 *
 * @ORM\Table(name="visiteurs")
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\VisiteursRepository")
 */
class Visiteurs
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
     * @ORM\Column(name="Nom", type="string", length=255)
     * @Assert\Length(min=2)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Prenom", type="string", length=255)
     * @Assert\Length(min=2)
     */
    private $prenom;
    /**
     * @var boolean
     *
     * @ORM\Column(name="reduit", type="boolean")
     */
    private $reduit;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_naissance", type="date")
     * @Assert\Date()
     */
    private $dateNaissance;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_reservation", type="date")
     * @Assert\Date()
     */
    private $dateReservation;

    /**
     * @var string
     *
     * @ORM\Column(name="tarif", type="integer")
     *
     */
    private $tarif;


    public function __construct()
    {
        $this->dateReservation = new \Datetime();
    }
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
     * Set type
     *
     * @param string $type
     *
     * @return Visiteurs
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Visiteurs
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
     * @return Visiteurs
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
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     *
     * @return Visiteurs
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set reduit
     *
     * @param \bollean $reduit
     *
     * @return Visiteurs
     */
    public function setReduit($reduit)
    {
        $this->reduit = $reduit;

        return $this;
    }

    /**
     * Get reduit
     *
     * @return \bollean
     */
    public function getReduit()
    {
        return $this->reduit;
    }

    /**
     * Set dateReservation
     *
     * @param \DateTime $dateReservation
     *
     * @return Visiteurs
     */
    public function setDateReservation($dateReservation)
    {
        $this->dateReservation = $dateReservation;

        return $this;
    }

    /**
     * Get dateReservation
     *
     * @return \DateTime
     */
    public function getDateReservation()
    {
        return $this->dateReservation;
    }

    /**
     * Set tarif
     *
     * @param integer $tarif
     *
     * @return Visiteurs
     */
    public function setTarif($tarif)
    {
        $this->tarif = $tarif;

        return $this;
    }

    /**
     * Get tarif
     *
     * @return integer
     */
    public function getTarif()
    {
        return $this->tarif;
    }

}
