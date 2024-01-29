<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * Contrôleur de la page de recherche
 */

class SearchController extends AbstractController
{
    /**
     * Méthode qui affiche la page d'inscription
     *
     * @param Request $request Requête
     * @param EntityManagerInterface $entityManager Gestionnaire d'entité
     *
     * @return Response Page d'inscription
     */

    #[Route('/search', name: 'app_search')]
    public function index2(Request $request, EntityManagerInterface $entityManager): Response
    {
        $searchQuery = $request->query->get('produit');
        $productsName = $entityManager->getRepository(Product::class)->findArticlesByName($searchQuery);

        return $this->render('search/searchBar.html.twig', [
            'articles' => $productsName,
            'search' => $searchQuery
        ]);
    }
}