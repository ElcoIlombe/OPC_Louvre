<?php

namespace CoreBundle\Controller;

use CoreBundle\Entity\Commandes;
use CoreBundle\Form\CommandesType;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Storage\PhpBridgeSessionStorage;




class TicketsController extends Controller
{
    public function indexAction( Request $request)
    {
        // Je crée un instance de l'instance session qui me permettra de faire passer les informations de la commande d'une page à l'autre avant validation de la commande. C'est seulement à la validation (paiement) que les informations persistés.
        $session = $request->getSession();

        // Je crée une instance de mon entité commandes pour la gestion des commandes.
        $commandes = new Commandes();

        // Je construis mon formulaire
        $formBuilder = $this->get('form.factory')->createBuilder(CommandesType::class, $commandes);

        // On récupère les données du formulaire

        $form = $formBuilder->getForm();

        // Je vérifie que la methode de mon formulaire est bien POST
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            // Je check si les informations de mon formulaire correspondent à ceux attendu par mon entité et si il a bien été soumis
            if ($form->isValid() && $form->isSubmitted()) {

                /// Je redirige vers la page de reception des informations et je passe en argument l'id qui me permettra de retrouver la commande et donc de l'afficher
                // $em = $this->getDoctrine()->getManager();
                // $em->persist($commandes);
                // for ( $i = 0; $i < count($commandes->visiteurs); $i++) {
                //     $em->persist($commandes->visiteurs[$i]);
                // }
                // $em->flush();

                // On compare la date de naissance et la date actuelle pour determiner l'âge du visiteur
                $dob = $commandes->getVisiteurs()[0]->getdateNaissance();
                $now = new \DateTime();
                $difference = $now->diff( $dob, true);
                $age = $difference->y;

                 // On récupère tous les tarifs [A METTRE DANS UN SERVICE]
                $repository = $this->getDoctrine()->getManager()->getRepository('CoreBundle:Tickets');
                $listTarifs = $repository->findAll();

                for ($i = 0; $i < count($commandes->getVisiteurs()); $i++){
                    // Si la case reduction est cochée, récupérer le tarifs réduit
                if( $commandes->getVisiteurs()[0]->getReduit()) {

                    $tarif = $listTarifs[3]->getTarifs();

                }
                else if ( ($commandes->getVisiteurs()[0]->getReduit() !== true) && (12 < $age ) && ($age < 60 ) ) {
                    $tarif = $listTarifs[0]->getTarifs();

                }
                else if (( $commandes->getVisiteurs()[0]->getReduit() !== true) && (12 > $age) ) {
                    $tarif = $listTarifs[1]->getTarifs();
                }
                else if (( $commandes->getVisiteurs()[0]->getReduit() !== true) && (60 < $age) ) {
                    $tarif = $listTarifs[2]->getTarifs();
                }
                else if ( ($commandes->getVisiteurs()[0]->getReduit() !== true) && (4 > $age) ) {
                    $tarif = $listTarifs[4]->getTarifs();
                }

                $commandes->getVisiteurs()[0]->setTarif($tarif);

                }

                $session->set('commandes', $commandes);
                $session->set('visiteurs', $commandes->getVisiteurs());
                $session->set('tarif', $commandes->getVisiteurs()[0]->getTarif());


                return $this->redirectToRoute('core_resume');
            }
        }
        return $this->render('CoreBundle:Tickets:index.html.twig', array(
            'form' => $form->createView()
        ));

    }






    public function resumeAction(Request $request)
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
