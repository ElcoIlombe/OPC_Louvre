<?php

namespace CoreBundle\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ValideReservationDay extends Constraint
{
  public $message = "Le Musé est fermé les mardis, le 1er Mai, le 1er Novembre ainsi que le 25 Decembre";

  public function validatedBy()
  {
    return 'core_bundle_validereservation'; // Ici, on fait appel à l'alias du service
  }
}
