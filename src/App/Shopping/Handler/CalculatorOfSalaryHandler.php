<?php

declare(strict_types=1);

namespace App\Shopping\Handler;

use App\Shopping\Employee;
use App\Shopping\Role;

class CalculatorOfSalaryHandler
{
    public function calculate(Employee $employee): float
    {
        if (Role::DEVELOPER === $employee->getRole()) {
            if (3000 < $employee->getSalary()) {
                return $employee->getSalary() * 0.8;
            }

            return $employee->getSalary() * 0.9;
        }

        return $employee->getSalary() * 0.85;
    }
}
