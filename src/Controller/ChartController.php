<?php

namespace App\Controller;

use App\Repository\OrderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

/**
 * Contrôleur qui gère le graphique de vente
 */

class ChartController extends AbstractController
{
    /**
     * Méthode qui affiche le graphique de vente
     *
     * @param OrderRepository $orderRepository Requête
     *
     * @return Response Page admin
     */

    #[Route('/chart', name: 'app_admin_chart')]
    #[isGranted("ROLE_ADMIN")]
    public function index(OrderRepository $orderRepository): Response
    {
        //Je récupère le premier et le dernier jour du mois en cours. Puis, j'initialise une ^période d'intervalle 1 jour entre le premier et le dernier jour
        $firstDayOfMonth = new \DateTime('first day of this month');
        $lastDayOfMonth = new \DateTime('last day of this month');
        $interval = new \DateInterval('P1D');
        $period = new \DatePeriod($firstDayOfMonth, $interval, $lastDayOfMonth);

        $labels = [];
        $data = [];

        foreach ($period as $date) {
            $data[] = $date->format('Y-m-d');
            $labels[] = 0;
        }

        $totalsByDate = $orderRepository->getTotalQuantitiesByDate();

        // Je cherche le total de la quantité de produit acheté par rapport à la date. S'il y en a alors je les ajoute aux labels.
        foreach ($totalsByDate as $result) {
            $index = array_search($result['date'], $data);
            if ($index !== false) {
                $labels[$index] = $result['totalQuantity'];
            }
        }

        return $this->render('admin/index.html.twig', [
            'labels' => json_encode($labels),
            'data' => json_encode($data),
            'totalsByDate' => $totalsByDate,
        ]);
    }
}

