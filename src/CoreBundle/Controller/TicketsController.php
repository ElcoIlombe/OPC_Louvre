<?php

namespace CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TicketsController extends Controller
{
    public function indexAction()
    {
        return $this->render('CoreBundle:Tickets:index.html.twig');
    }
}
