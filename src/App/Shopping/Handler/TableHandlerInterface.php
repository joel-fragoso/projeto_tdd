<?php

declare(strict_types=1);

namespace App\Shopping\Handler;

/**
 * TableHandlerInterface interface
 */
interface TableHandlerInterface
{
    public function toValue($value);
}
