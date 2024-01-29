<?php

namespace App\Controller;

use App\Entity\CartItem;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Contrôleur de la page du panier
 */

class ShoppingCartController extends AbstractController
{
    /**
     * Méthode qui affiche la page du panier
     *
     * @return Response Page du panier
     */

    #[Route('/shopping/cart', name: 'app_shopping_cart')]
    public function index(): Response
    {
        $user = $this->getUser();
        if (is_null($user)) {
            return $this->redirectToRoute('app_home');
        }
        $items = $user->getShoppingCart()->getItem();
        $nbProducts = $user->getShoppingCart()->getNbProducts();
        $total = $user->getShoppingCart()->getTotalPrice();
        return $this->render('shopping_cart/index.html.twig', [
            'items' => $items,
            'nbProducts' => $nbProducts,
            'total' => $total
        ]);
    }


    /**
     * Méthode qui ajoute des produits au panier
     *
     * @param int $id Id du produit à ajouter au panier
     * @param Request $request Requête
     * @param EntityManagerInterface $authenticationUtils Utilitaire d'authentification
     *
     * @return Response Page du panier
     */

    #[Route('/shopping/cart/add/{id}', name: 'app_shopping_cart_add')]
    public function add(int $id, Request $request, EntityManagerInterface $entityManager): Response
    {
        $id = intval($id);
        $user = $this->getUser();
        $product = $entityManager->getRepository(Product::class)->find($id);
        $quantity = $request->request->get('quantity');

        if ($product->getQuantity() >= $quantity) {
            $cartItems = $user->getShoppingCart()->getItem();
            $existingCartItem = null;

            foreach ($cartItems as $cartItem) {
                if ($cartItem->getProduct() === $product) {
                    $existingCartItem = $cartItem;
                    break;
                }
            }
            if ($existingCartItem) {
                $existingQuantity = $existingCartItem->getQuantity();
                $availableQuantity = $product->getQuantity() - $existingQuantity;

                if ($availableQuantity >= $quantity) {
                    $existingCartItem->setQuantity($existingQuantity + $quantity);
                }
            } else {
                $cartItem = new CartItem();
                $cartItem->setProduct($product)->setQuantity($quantity);

                $user->getShoppingCart()->addItem($cartItem, $quantity);
            }
            $entityManager->persist($user);
            $entityManager->flush();
        }
        return $this->redirectToRoute('app_shopping_cart');

    }


    /**
     * Méthode qui supprimer des produits au panier
     *
     * @param int $id Id du produit à supprimer du panier
     * @param EntityManagerInterface $authenticationUtils Utilitaire d'authentification
     *
     * @return Response Page du panier
     */

    #[Route('/shopping/cart/remove/{id}', name: 'app_shopping_cart_remove')]
    public function remove(int $id, EntityManagerInterface $entityManager): Response
    {
        $id = intval($id);
        $user = $this->getUser();

        $product = $entityManager->getRepository(Product::class)->find($id);

        $cartItems = $user->getShoppingCart()->getItem();

        foreach ($cartItems as $cartItem) {
            if ($cartItem->getProduct() === $product) {
                $user->getShoppingCart()->removeItem($cartItem);
                $entityManager->remove($cartItem);
                break;
            }
        }

        $entityManager->persist($user);
        $entityManager->flush();
        return $this->redirectToRoute('app_shopping_cart');
    }


    /**
     * Méthode qui décrémente des produits du panier
     *
     * @param int $id Id du produit à décrémenter
     * @param EntityManagerInterface $authenticationUtils Utilitaire d'authentification
     *
     * @return Response Page du panier
     */

    #[Route('/shopping/cart/decrement/{id}', name: 'app_shopping_cart_decrement')]
    public function decrement(int $id, EntityManagerInterface $entityManager): Response
    {
        $id = intval($id);
        $user = $this->getUser();

        $product = $entityManager->getRepository(Product::class)->find($id);

        $cartItems = $user->getShoppingCart()->getItem();

        foreach ($cartItems as $cartItem) {
            if ($cartItem->getProduct() === $product) {
                $quantity = $cartItem->getQuantity();

                if ($quantity > 1) {
                    $cartItem->setQuantity($quantity - 1);
                    $entityManager->persist($cartItem);
                    break;
                } else {
                    $user->getShoppingCart()->removeItem($cartItem);
                    $entityManager->remove($cartItem);
                    break;
                }
            }
        }

        $entityManager->persist($user);
        $entityManager->flush();
        return $this->redirectToRoute('app_shopping_cart');
    }


    /**
     * Méthode qui incrémente des produits du panier
     *
     * @param int $id Id du produit à incrémenter
     * @param EntityManagerInterface $authenticationUtils Utilitaire d'authentification
     *
     * @return Response Page du panier
     */

    #[Route('/shopping/cart/increment/{id}', name: 'app_shopping_cart_increment')]
    public function increment(int $id, EntityManagerInterface $entityManager): Response
    {
        $id = intval($id);
        $user = $this->getUser();

        $showDiv = false;

        $product = $entityManager->getRepository(Product::class)->find($id);

        $cartItems = $user->getShoppingCart()->getItem();

        foreach ($cartItems as $cartItem) {
            if ($cartItem->getProduct() === $product) {
                $quantity = $cartItem->getQuantity();
                if ($quantity == $cartItem->getProduct()->getQuantity()) {
                    /*alerte pour dire pourquoi on peut pas ajouter dans le panier*/
                } else {
                    $cartItem->setQuantity($quantity + 1);
                    $entityManager->persist($cartItem);
                }
            }
        }

        $entityManager->persist($user);
        $entityManager->flush();

        return $this->redirectToRoute('app_shopping_cart');
    }
}
