<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Contrôleur de la page de connexion
 */

class SecurityController extends AbstractController
{
    /**
     * Méthode qui affiche la page de connexion
     *
     * @param AuthenticationUtils $authenticationUtils Utilitaire d'authentification
     *
     * @return Response Page de connexion
     */

    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastEmail = $authenticationUtils->getLastUsername();

        $errorMessage = '';
        if ($error instanceof AuthenticationException) {
            if ($error->getMessage() === 'The presented password is invalid.') {
                $errorMessage = 'Le mot de passe est incorrect';
            } else if($error->getMessage() === 'Bad credentials.'){
                $errorMessage = 'Aucun compte associé à cette adresse mail';
            }
        }

        return $this->render('login/login.html.twig', [
            'last_email' => $lastEmail,
            'error' => $errorMessage,
        ]);
    }


    /**
     * Méthode qui gère la déconnexion
     */
    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
