<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Contrôleur des pages de produits
 */

class ProductController extends AbstractController
{
    /**
     * Méthode qui affiche la page d'un produit
     *
     * @param EntityManagerInterface $entityManager Gestionnaire d'entité
     * @param int $id Identifiant du produit
     *
     * @return Response Page du produit
     */

    #[Route('/product/{id}', name: 'app_product')]
    public function display(EntityManagerInterface $entityManager, int $id): Response
    {
        $productRepository = $entityManager->getRepository(Product::class);
        $product = $productRepository->find($id);

        $products = $productRepository->findBy(['category' => $product->getCategory()]);
        // Filtrer la liste des produits pour exclure le produit actuel
        $products = array_filter($products, function($p) use ($product) {
            return $p !== $product;
        });
        return $this->render('product/product.html.twig', [
            'product' => $product,
            'products' => $products,
        ]);
    }


    /**
     * Méthode qui affiche la page de tous les produits d'une catégorie
     *
     * @param EntityManagerInterface $entityManager Gestionnaire d'entité
     *
     * @return Response Page des produits d'une même catégorie
     */

    #[Route('/products/{name}', name: 'app_products')]
    public function displayAll(EntityManagerInterface $entityManager, string $name): Response
    {
        $categoryRepository = $entityManager->getRepository(Category::class);
        $category = $categoryRepository->find($name);

        $productRepository = $entityManager->getRepository(Product::class);
        $products = $productRepository->findBy(['category' => $category]);
        return $this->render('product/products.html.twig', [
            'products' => $products,
        ]);
    }
}
