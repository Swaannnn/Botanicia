<?php

namespace App\Command;

use App\Service\OrderProcessor;

/**
 * Commande d'annulation de commande.
 */

class CancelOrderCommand implements Command
{
    private OrderProcessor $orderProcessor;

    /**
     * Constructeur de la classe d'Annulation de commande
     *
     * @param OrderProcessor $orderProcessor Instance de la classe OrderProcessor utilisée pour le traitement des commandes
     */

    public function __construct(OrderProcessor $orderProcessor) {
        $this->orderProcessor = $orderProcessor;
    }


    /**
     * Exécute l'annulation de commande
     * Cette méthode délègue la logique spécifique à l'annulation de commande au Receiver
     *
     * @return void
     */

    public function execute(): void {
        $this->orderProcessor->cancelOrder();
    }
}