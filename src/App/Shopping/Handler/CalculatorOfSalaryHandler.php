<?php

declare(strict_types=1);

namespace App\Shopping\Handler;

use App\Shopping\Employee;
use App\Shopping\Role;

class CalculatorOfSalaryHandler
{
    public function calculate(Employee $employee): float
    {
        $role = new Role($employee->getRole());

        return $role->getRule()->calculate($employee);
    }
}
