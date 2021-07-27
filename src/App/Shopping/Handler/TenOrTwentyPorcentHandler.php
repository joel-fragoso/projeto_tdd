<?php

declare(strict_types=1);

namespace App\Shopping\Handler;

class TenOrTwentyPorcentHandler extends CalculatorRuleAbstract
{
    protected function limit()
    {
        return 3000;
    }

    protected function porcentOverLimit()
    {
        return 0.8;
    }

    protected function porcentBase()
    {
        return 0.9;
    }
}
