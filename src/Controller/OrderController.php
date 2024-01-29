<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Entity\Address;
use App\Entity\Order;
use App\Entity\OrderItem;
use App\Entity\ShoppingCart;
use App\Exception\PaymentException;
use App\Service\CreditCardPayment;
use App\Service\PayPalPayment;
use DateTime;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Controlleur pour les commandes des utilisateurs
 */

class OrderController extends AbstractController
{
    private $urlGenerator;

    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }


    /**
     * Affiche les informations de la commande et le formulaire de paiement
     *
     * @param EntityManagerInterface $entityManager Gestionnaire d'entité
     *
     * @return Response Page de commande
     */

    #[Route('/order/infos', name: 'app_order')]
    public function adress(EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
        $total = $user->getShoppingCart()->getTotalPrice();
        return $this->render('order/infos.html.twig', [
            'creditCardError'=>'',
            'payPalPaymentError'=>'',
            'total' => $total
        ]);
    }


    /**
     * Valide la commande et vérifie le paiement
     *
     * @param Request $request requête
     * @param EntityManagerInterface $entityManager Gestionnaire d'entité
     *
     * @return Response Page de validation de la commande
     */

    #[Route('/order/trait', name: 'app_order_trait', methods:("POST"))]
    public function trait(Request $request, EntityManagerInterface $entityManager): Response {
        $order = new Order();
        $total = 0.0;
        $datat = $request->request->all();

        $address = new Address(
            $datat['firstName'],
            $datat['lastName'],
            $datat['street'],
            $datat['postalCode'],
            $datat['city'],
            $datat['country'],
            $datat['phoneNumber']
        );

        if (is_null($this->getUser()->getAddress())) {
            $this->getUser()->setAddress($address);
            $entityManager->persist($this->getUser());
            $entityManager->persist($address);
            $order->setAddress($address);
        } elseif ($address != $this->getUser()->getAddress()) {
            $entityManager->persist($address);
            $order->setAddress($address);
        } else {
            $order->setAddress($this->getUser()->getAddress());
        }

        if (is_null($this->getUser()->getPhoneNumber())) {
            $this->getUser()->setPhoneNumber($datat['phoneNumber']);
        }

        foreach ($this->getUser()->getShoppingCart()->getItem() as $item) :
            $orderItem = new OrderItem();
            $orderItem->setProduct($item->getProduct());
            $quantityProduct = $item->getProduct()->getQuantity();
            $quantityItem = $item->getQuantity();
            $item->getProduct()->setQuantity($quantityProduct - $quantityItem);
            $total +=  $item->getProduct()->getPrice()*$quantityItem;
            $orderItem->setQuantity($item->getQuantity());
            $entityManager->persist($orderItem);

            $order->addOrderItem($orderItem);
        endforeach;
        $shoppingCart = new ShoppingCart();
        $this->getUser()->setShoppingCart($shoppingCart);

        $order->setUser($this->getUser());

        $date = new DateTime(); // Crée un nouvel objet DateTime avec la date actuelle
        $order->setDate($date); // Définit la date pour la commande en utilisant un objet DateTime

        $total = $total + 5; // pour les 5€ de livraison
        $order->setTotalPrice($total);
        $entityManager->persist($order);
        $entityManager->flush();
        return $this->redirectToRoute('app_order_valide', ['id' => $order->getId()]);
    }


    /**
     * Affiche la confirmation de commande
     *
     * @param EntityManagerInterface $entityManager Gestionnaire d'entité
     *
     * @return Response Page de confirmation de commande
     */

    #[Route('/order/valide/{id}', name: 'app_order_valide')]
    public function valide(int $id, EntityManagerInterface $entityManager): Response
    {
        $order = $entityManager->getRepository(Order::class)->find($id);

        // Vérifier si l'utilisateur est connecté et s'il est le propriétaire de la commande
        if ($order && $this->getUser() === $order->getUser()) {
            return $this->render('order/valid.html.twig', [
                'order' => $order,
            ]);
        } else {
            return $this->redirectToRoute("app_error");
        }
    }
}
