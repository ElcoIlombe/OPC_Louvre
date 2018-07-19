<?php

namespace CoreBundle\Validator;

use Doctrine\ORM\EntityManagerInterface;
use CoreBundle\Entity\Commandes;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class ValideReservationDayValidator extends ConstraintValidator
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

    $now = date("Y-d-m");
    // var_dump($now);
    $currYear = date("Y");
    $currDay = date("D");
    $holadays = array(  date($currYear ."-25-12 " ),  date($currYear ."-01-11"),  date($currYear ."-01-05 "));
    for ($i=0; $i < count($holadays) ; $i++) {
        if ($holadays[$i] == $now || $currDay == "Tue") {
          $this->context->addViolation($constraint->message);
          break;
        }
    }
  }
}
