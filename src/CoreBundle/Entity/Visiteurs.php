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
     * @var string
     *
     * @ORM\Column(name="reduit", type="string", length=255)
     * @Assert\Length(min=2)
     */
    private $reduit;

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
     * @return Reservation
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
     * Set tarifs
     *
     * @param integer $tarifs
     *
     * @return Reservation
     */
    public function setTarifs($tarifs)
    {
        $this->tarifs = $tarifs;

        return $this;
    }

    /**
     * Get tarifs
     *
     * @return int
     */
    public function getTarifs()
    {
        return $this->tarifs;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Reservation
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
     * @return Reservation
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
     * Set dateReservation
     *
     * @param \DateTime $dateReservation
     *
     * @return Reservation
     */
    public function setDateNaissance($dateReservation)
    {
        $this->dateReservation = $dateReservation;

        return $this;
    }

    /**
     * Get dateReservation
     *
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateReservation;
    }

    /**
     * Set reduit
     *
     * @param \bollean $reduit
     *
     * @return Reservation
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
}
