<?php

namespace App\Command;

use App\Service\OrderProcessor;

/**
 * Commande de création de commande.
 */
class PlaceOrderCommand implements Command
{
    private OrderProcessor $orderProcessor;

    /**
     * Constructeur de la classe de création de commande
     *
     * @param OrderProcessor $orderProcessor Instance de la classe OrderProcessor utilisée pour le traitement des commandes
     */

    public function __construct(OrderProcessor $orderProcessor) {
        $this->orderProcessor = $orderProcessor;
    }


    /**
     * Exécute la création de commande
     * Cette méthode délègue la logique spécifique à la création de commande au Receiver (OrderProcessor).
     *
     * @return void
     */

    public function execute(): void {
        // Logique spécifique à la création de commande déléguée au Receiver.
        $this->orderProcessor->processOrder();
    }
}