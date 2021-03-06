<?php

namespace CoreBundle\Validator;

use Doctrine\ORM\EntityManagerInterface;
use CoreBundle\Entity\Commandes;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class ValideDateValidator extends ConstraintValidator
{
  private $requestStack;
  private $em;

  public function __construct(RequestStack $requestStack, EntityManagerInterface $em)
  {
    $this->requestStack = $requestStack;
    $this->em           = $em;
  }



  public function validate($value, Constraint $constraint)
  {
    $visiteDate = $value;
    $todayCommandes = $this->em->getRepository('CoreBundle:Commandes')->findBy(
                  array('dateReservation' => $visiteDate)
                );
    $todayCommandes = count($todayCommandes);
    if ($todayCommandes >= 1000 ) {
      $this->context->addViolation($constraint->message);
    }
  }
}
