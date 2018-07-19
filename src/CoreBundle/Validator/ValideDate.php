<?php

namespace CoreBundle\Validator;

use Symfony\Component\Validator\Constraint;

/**
*@Annotation
 */

class ValideDate extends Constraint
{

  public $message = "La capacité maximale du musé pour les commandes en ligne (1 000) est dépassée pour cette date";

  public function validateBy()
  {
    return 'core_bundle_validedate';
  }
}
