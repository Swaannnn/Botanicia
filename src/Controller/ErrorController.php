<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Contrôleur pour les erreurs
 */

class ErrorController extends AbstractController
{
    /**
     * Méthode qui affiche une page d'erreur 404 quand il y a une erreur dans l'url
     *
     * @return Response Page 404
     */

    #[Route('/error404', name: 'app_error')]
    public function show404(): Response
    {
        return $this->render('error/404.html.twig');
    }
}