<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Contrlleur du footer
 */

class FooterController extends AbstractController
{
    /**
     * Méthode qui redirige vers les bonne pages
     *
     * @param string $page lien de la page à accéder
     */

    #[Route('/footer/{page}', name: 'app_footer')]
    public function index(string $page): Response
    {
        if ($page == "conditions générales de ventes") {
            return $this->render('footer/cgv.html.twig', [
                'controller_name' => 'FooterController',
            ]);
        } else if ($page == "mention légales") {
            return $this->render('footer/mentionsLegales.html.twig', [
                'controller_name' => 'FooterController',
            ]);
        } else {
            return $this->render('footer/politiqueConfidentialite.html.twig', [
                'controller_name' => 'FooterController',
            ]);
        }
    }
}
