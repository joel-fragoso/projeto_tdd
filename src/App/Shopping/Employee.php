<?php

declare(strict_types=1);

namespace App\Shopping;

class Employee
{
    private string $name;

    private float $salary;

    private int $role;

    public function __construct(string $name, float $salary, int $role)
    {
        $this->name   = $name;
        $this->salary = $salary;
        $this->role   = $role;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSalary(): float
    {
        return $this->salary;
    }

    public function getRole(): int
    {
        return $this->role;
    }
}
