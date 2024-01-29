<?php

namespace App\Controller;

use App\Entity\Address;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Contrôleur qui gère les pages du compte utilisateur
 */

class AccountController extends AbstractController
{
    /**
     * Affiche la page du compte utilisateur
     *
     * @return Response
     */

    #[Route('/account', name: 'app_account')]
    #[isGranted('ROLE_USER')]
    public function index(): Response
    {
        return $this->render('account/index.html.twig', [
            'controller_name' => 'AccountController',
        ]);
    }

    /**
     * Affiche la page de modification du compte utilisateur
     *
     * @param Request $request Requête
     * @param EntityManagerInterface $entityManager Gestionnaire d'entité
     *
     * @return Response Page du compte
     */

    #[Route(name: 'app_account_modifie', methods:("POST"))]
    #[isGranted('ROLE_USER')]
    public function modifie(Request $request, EntityManagerInterface $entityManager): Response{

        $user = $this->getUser();

        $phoneNumber = $request->request->get('phoneNumber');
        $street = $request->request->get('street');
        $postalCode = $request->request->get('postal_code');
        $city = $request->request->get('city');
        $country = $request->request->get('country');


        $user->setPhoneNumber($phoneNumber);
        $user->setAddress(new Address($user->getLastName(), $user->getFirstName(), $street, $postalCode, $city, $country, $phoneNumber));


        $entityManager->persist($user);
        $entityManager->flush();


        return $this->redirectToRoute('app_account');


    }
}