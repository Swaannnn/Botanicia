<?php

namespace App\Command;

/**
 * Command pattern
 */
interface Command
{
    /**
     * Methode execute qui permet d'executer la commande
     * @return void
     */
    public function execute(): void;
}