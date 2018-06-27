<?php

namespace CoreBundle\Controller;

use CoreBundle\Entity\Commandes;
use CoreBundle\Form\CommandesType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;



class TicketsController extends Controller
{
    public function indexAction( Request $request)
    {
        // Je crée une instance de mon entité
        $commandes = new Commandes();

        // Je construis mon formulaire
        $formBuilder = $this->get('form.factory')->createBuilder(CommandesType::class, $commandes);

        $form = $formBuilder->getForm();

        // Je vérifie que la methode de mon formulaire est bien POST
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            // Je check si les informations de mon formulaire correspondent à ceux attendu par mon entité
            if ($form->isValid()) {
                // Je redirige vers la page de reception des informations et je passe en argument l'id qui me permettra de retrouver la commande et donc de l'afficher
                $em = $this->getDoctrine()->getManager();
                $em->persist($commandes);
                $em->flush();

                return $this->redirectToRoute('core_resume');
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
