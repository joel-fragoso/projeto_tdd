<?php

declare(strict_types=1);

namespace App\Shopping\Handler;

class FifteenOrTwentyFivePorcentHandler extends CalculatorRuleAbstract
{
    protected function limit()
    {
        return 2500;
    }

    protected function porcentOverLimit()
    {
        return 0.75;
    }

    protected function porcentBase()
    {
        return 0.85;
    }
}
