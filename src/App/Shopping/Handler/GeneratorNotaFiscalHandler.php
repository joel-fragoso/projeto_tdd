<?php

declare(strict_types=1);

namespace App\Shopping\Handler;

use App\Shopping\NotaFiscal;
use App\Shopping\Order;

/**
 * GeneratorNotaFiscalHandler class
 */
class GeneratorNotaFiscalHandler
{
    private array $actions;

    private WatchHandlerInterface $watch;

    private TableHandlerInterface $table;

    public function __construct(array $actions, WatchHandlerInterface $watch, TableHandlerInterface $table)
    {
        $this->actions = $actions;
        $this->watch   = $watch;
        $this->table   = $table;
    }

    /**
     * @return NotaFiscal
     */
    public function generate(Order $order)
    {
        $tableValue = $this->table->toValue($order->getTotalValue());
        $totalValue = $order->getTotalValue() - ($order->getTotalValue() * $tableValue);

        $notaFiscal = new NotaFiscal(
            $order->getClient(),
            $totalValue,
            $this->watch->now()
        );

        foreach ($this->actions as $aciton) {
            $aciton->execute($notaFiscal);
        }

        return $notaFiscal;
    }
}
