<?php

namespace App\Controller;

use App\Entity\ShoppingCart;
use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Security\UserAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

/**
 * Contrôleur de la page d'inscription
 */

class RegistrationController extends AbstractController
{
    /**
     * Méthode qui affiche la page d'inscription
     *
     * @param Request $request Requête
     * @param UserPasswordHasherInterface $userPasswordHasher Hasher de mot de passe
     * @param UserAuthenticatorInterface $userAuthenticator Authentificateur d'utilisateur
     * @param UserAuthenticator $authenticator Authentificateur
     * @param EntityManagerInterface $entityManager Gestionnaire d'entité
     *
     * @return Response Page d'inscription
     */

    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, UserAuthenticator $authenticator, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );
            $user->setRoles(["ROLE_USER"]);

            $shoppingCart = new ShoppingCart();
            $entityManager->persist($shoppingCart);
            $entityManager->flush();

            $user->setShoppingCart($shoppingCart);

            $entityManager->persist($user);
            $entityManager->flush();

            return $userAuthenticator->authenticateUser(
                $user,
                $authenticator,
                $request
            );
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
