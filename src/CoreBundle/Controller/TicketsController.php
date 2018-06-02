<?php

namespace CoreBundle\Controller;

use CoreBundle\Entity\Reservation;
use CoreBundle\Form\ReservationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;



class TicketsController extends Controller
{
    public function indexAction( Request $request)
    {
        // Je crée une instance de mon entité
        $reservation = new Reservation();

        // Je construis mon formulaire
        $formBuilder = $this->get('form.factory')->createBuilder(ReservationType::class, $reservation);

        $form = $formBuilder->getForm();

        // Je vérifie que la methode de mon formulaire est bien POST
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            // Je check si les informations de mon formulaire correspondent à ceux attendu par mon entité
            if ($form->isValid()) {
                // Je redirige vers la page de reception des informations et je passe en argument l'id qui me permettra de retrouver la commande et donc de l'afficher
                return $this->redirectToRoute('core_resume', array(
                        'id' => $reservation->getId()));
            }
        }
        return $this->render('CoreBundle:Tickets:index.html.twig', array(
            'form' => $form->createView()
        ));

    }
    public function resumeAction()
    {
        return $this->render('CoreBundle:Tickets:resume.html.twig');
    }
    public function paiementAction()
    {
        return $this->render('CoreBundle:Tickets:paiement.html.twig');
    }
    public function errorAction()
    {
        return $this->render('CoreBundle:Tickets:paiement-error.html.twig');
    }
    public function thanksAction()
    {
        return $this->render('CoreBundle:Tickets:thanksyou.html.twig');
    }
}
