<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Commandes
 *
 * @ORM\Table(name="commandes")
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\CommandesRepository")
 */
class Commandes
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
     * @ORM\Column(name="Email", type="string", length=255)
     * @Assert\Email()
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="Pays", type="string", length=255)
     * @Assert\Country()
     */
    private $pays;
     /**
     * @var string
     *
     * @ORM\Column(name="Type", type="string", length=255)
     * @assert\Length(min=2, max=255)
     */
    private $type;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_reservation", type="datetime")
     * @Assert\DateTime()
     */
    private $dateReservation;


    /*
    *@ORM\OneToMany(targetEntity="oc_louvre\CoreBundle\Entity\Visiteurs", cascade= {"persist"})
    * @Assert\Valid()
    * @Assert\Count(min=1, minMessage="Trop court" )
    */
    public $visiteurs;

    public function __construct(){
        $this->dateNaissance = new \Datetime();
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
     * Set email
     *
     * @param string $email
     *
     * @return Clients
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set pays
     *
     * @param string $pays
     *
     * @return Clients
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string
     */
    public function getPays()
    {
        return $this->pays;
    }
    /**
     * Set type
     *
     * @param string $type
     *
     * @return Commande
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
     * Set dateReservation
     *
     * @param \DateTime $dateReservation
     *
     * @return Commande
     */
    public function setDateReservation($dateReservation)
    {
        $this->dateReservation = $dateReservation;

        return $this;
    }
        /**
     * Set visiteurs
     *
     * @param string $visiteurs
     *
     * @return Commande
     */
    public function setVisiteurs($visiteurs)
    {
        $this->visiteurs = $visiteurs;

        return $this;
    }

    /**
     * Get visiteurs
     *
     * @return string
     */
    public function getVisiteurs()
    {
        return $this->visiteurs;
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
}
