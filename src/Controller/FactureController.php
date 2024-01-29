<?php

namespace App\Controller;

use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Component\Filesystem\Filesystem;

/**
 * Contrôleur pour la génération de factures
 */

class FactureController extends AbstractController
{
    /**
     * Méthode qui génère une facture
     *
     * @param int $orderId id de la commande
     * @param EntityManagerInterface $entityManager Gestionnaire d'entité
     */

    #[Route('/facture/{orderId}', name: 'app_facture')]

    public function genererFacture(int $orderId, EntityManagerInterface $entityManager)
    {
        $userRepository = $entityManager->getRepository(Order::class);
        $order = $userRepository->find($orderId);

        if ($order && $order->getUser() == $this->getUser()) {
            $pdfOptions = new Options();
            $pdfOptions->set('defaultFont', 'Arial');

            $dompdf = new Dompdf($pdfOptions);

            $html = '<style>';
            $html .= 'body { font-family: Arial, sans-serif; margin: 30px; }';
            $html .= 'h1 { color: #333; }';
            $html .= 'table { width: 100%; border-collapse: collapse; margin-top: 20px; }';
            $html .= 'th, td { border: 1px solid #dddddd; text-align: left; padding: 8px; }';
            $html .= 'tfoot { font-weight: bold; }';
            $html .= '</style>';

            $html .= '<h1>Facture</h1>';
            $html .= '<p>Numéro de commande: ' . $order->getId() . '</p>';
            $html .= '<p>Date de commande: ' . $order->getDate()->format('d-m-Y') . '</p>';

            $html .= '<h2>Coordonnées du client</h2>';
            $html .= '<p>Nom: ' . $order->getUser()->getLastName() . '</p>';
            $html .= '<p>Prénom: ' . $order->getUser()->getFirstName() . '</p>';
            $html .= '<p>Email: ' . $order->getUser()->getEmail() . '</p>';
            $html .= '<p>Numéro de téléphone: ' . $order->getUser()->getPhoneNumber() . '</p>';


            $html .= '<h2>Détails de la commande</h2>';
            $html .= '<table>';
            $html .= '<thead>';
            $html .= '<tr>';
            $html .= '<th>Article</th>';
            $html .= '<th>Prix unitaire</th>';
            $html .= '<th>Quantité</th>';
            $html .= '<th>Total</th>';
            $html .= '</tr>';
            $html .= '</thead>';
            $html .= '<tbody>';

            $totalAmount = 0;

            foreach ($order->getOrderItems() as $orderItem) {
                $product = $orderItem->getProduct();
                $html .= '<tr>';
                $html .= '<td>' . $product->getName() . '</td>';
                $html .= '<td>' . $product->getPrice() . '€</td>';
                $html .= '<td>' . $orderItem->getQuantity() . '</td>';
                $total = $product->getPrice() * $orderItem->getQuantity();
                $html .= '<td>' . $total . '€ </td>';
                $html .= '</tr>';
                $totalAmount += $total;
            }

            $html .= '<tr>';
            $html .= '<td colspan="3">Livraison</td>';
            $html .= '<td> 5€ </td>';
            $html .= '</tr>';

            $html .= '</tbody>';
            $html .= '<tfoot>';
            $html .= '<tr>';
            $html .= '<td colspan="3">Total</td>';
            $html .= '<td>' . $totalAmount+5 . '€ </td>';
            $html .= '</tr>';
            $html .= '</tfoot>';
            $html .= '</table>';

            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();

            $output = $dompdf->output();
            $pdfFileName = 'facture_commande_' . $order->getId() . '.pdf';

            $response = new Response($output, Response::HTTP_OK, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . $pdfFileName . '"',
            ]);

            return $response;

        } else {

            return $this->redirectToRoute('app_account');
        }
    }
}
