<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\RememberMeBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\SecurityRequestAttributes;
use Symfony\Component\Security\Http\Util\TargetPathTrait;

/**
 * Class UserAuthenticator - Classe qui gère l'authentification d'un utilisateur
 */

class UserAuthenticator extends AbstractLoginFormAuthenticator
{
    use TargetPathTrait;

    // Définition de la route de connexion
    public const LOGIN_ROUTE = 'app_login';


    /**
     * Constructeur de l'authentificateur
     * @param UrlGeneratorInterface $urlGenerator Générateur d'url
     */

    public function __construct(private UrlGeneratorInterface $urlGenerator)
    {
    }


    /**
     * Méthode qui gère l'authentification
     *
     * @param Request $request Requête
     *
     * @return Passport
     */

    public function authenticate(Request $request): Passport
    {
        $email = $request->request->get('email', '');

        $request->getSession()->set(SecurityRequestAttributes::LAST_USERNAME, $email);

        return new Passport(
            new UserBadge($email),
            new PasswordCredentials($request->request->get('password', '')),
            [
                new CsrfTokenBadge('authenticate', $request->request->get('_csrf_token')),
                new RememberMeBadge(),
            ]
        );
    }


    /**
     * Méthode qui gère l'authentification réussie
     *
     * @param Request $request Requête
     * @param TokenInterface $token Token
     * @param string $firewallName
     *
     * @return ?Response
     */

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        if ($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {
            return new RedirectResponse($targetPath);
        }

        return new RedirectResponse($this->urlGenerator->generate('app_home'));
    }


    /**
     * Méthode qui gère l'authentification échouée
     *
     * @param Request $request Reqûete
     *
     * @return string
     */

    protected function getLoginUrl(Request $request): string
    {
        return $this->urlGenerator->generate(self::LOGIN_ROUTE);
    }
}
