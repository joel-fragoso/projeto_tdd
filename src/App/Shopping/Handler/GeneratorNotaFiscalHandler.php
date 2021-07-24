<?php

declare(strict_types=1);

namespace App\Shopping\Handler;

use App\Shopping\NotaFiscal;
use App\Shopping\NotaFiscalDAO;
use App\Shopping\Order;
use App\Shopping\SAP;
use DateTime;

/**
 * GeneratorNotaFiscalHandler class
 */
class GeneratorNotaFiscalHandler
{
    private NotaFiscalDAO $notaFiscalDAO;

    private SAP $sap;

    public function __construct(NotaFiscalDAO $notaFiscalDAO, SAP $sap)
    {
        $this->notaFiscalDAO = $notaFiscalDAO;
        $this->sap           = $sap;
    }

    public function generate(Order $order)
    {
        $notaFiscal = new NotaFiscal(
            $order->getClient(),
            $order->getTotalValue() * 0.94,
            new DateTime()
        );

        if (! $this->notaFiscalDAO->persist($notaFiscal) || ! $this->sap->send($notaFiscal)) {
            return null;
        }

        return $notaFiscal;
    }
}
