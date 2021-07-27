<?php

declare(strict_types=1);

namespace App\Shopping\Handler;

use App\Shopping\NotaFiscal;

/**
 * ActionAfterGeneratingNotaFiscalHandlerInterface interface
 */
interface ActionAfterGeneratingNotaFiscalHandlerInterface
{
    public function execute(NotaFiscal $notaFiscal);
}
