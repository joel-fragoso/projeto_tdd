<?php

declare(strict_types=1);

namespace App\Shopping\Handler;

use DateTime;

/**
 * SystemWatchHandler class
 */
class SystemWatchHandler implements WatchHandlerInterface
{
    public function now()
    {
        return DateTime::createFromFormat('Y-m-d', date('Y-m-d'));
    }
}
