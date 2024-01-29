<?php

namespace App\Exception;

use Symfony\Component\HttpKernel\Exception\HttpException;

class PaymentException extends HttpException
{

    /**
     * Constructeur de la Classe pour les Exceptions de Paiement
     *
     * @param string $message Message de l'exception
     * @param ?\Throwable $previous Exception précédente
     * @param array $headers Tableau associatif des en-têtes HTTP
     * @param ?int $code Code de l'exception
     */

    public function __construct(string $message = 'Payment Exception', \Throwable $previous = null, array $headers = [], ?int $code = 0)
    {
        parent::__construct(500, $message, $previous, $headers, $code);
    }
}