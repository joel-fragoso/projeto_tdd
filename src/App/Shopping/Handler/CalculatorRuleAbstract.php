<?php

declare(strict_types=1);

namespace App\Shopping\Handler;

use App\Shopping\Employee;

/**
 * CalculatorRuleAbstract class
 */
abstract class CalculatorRuleAbstract
{
    public function calculate(Employee $employee): float
    {
        $salary = $employee->getSalary();

        if ($this->limit() < $salary) {
            return $salary * $this->porcentOverLimit();
        }

        return $salary * $this->porcentBase();
    }

    abstract protected function limit();

    abstract protected function porcentOverLimit();

    abstract protected function porcentBase();
}
