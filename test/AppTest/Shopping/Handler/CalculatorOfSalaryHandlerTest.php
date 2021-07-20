<?php

declare(strict_types=1);

namespace AppTest\Shopping\Handler;

use App\Shopping\Employee;
use App\Shopping\Handler\CalculatorOfSalaryHandler;
use App\Shopping\Role;
use PHPUnit\Framework\TestCase;

class CalculatorOfSalaryHandlerTest extends TestCase
{
    private CalculatorOfSalaryHandler $calculatorOfSalaryHandler;

    public function setUp(): void
    {
        $this->calculatorOfSalaryHandler = new CalculatorOfSalaryHandler();
    }

    public function testShouldBeAbleToCalculateOfTheDeveloperSalaryWithLessThanTheLimit()
    {
        $developer = new Employee('André', 1500, Role::DEVELOPER);

        $salary = $this->calculatorOfSalaryHandler->calculate($developer);

        $this->assertEquals(1500 * 0.9, $salary);
    }

    public function testShouldBeAbleToCalculateOfTheDeveloperSalaryWithMoreThanTheLimit()
    {
        $developer = new Employee('André', 4000, Role::DEVELOPER);

        $salary = $this->calculatorOfSalaryHandler->calculate($developer);

        $this->assertEquals(4000 * 0.8, $salary);
    }

    public function testShouldBeAbleToCalculateOfTheDBASalaryWithLessThanTheLimit()
    {
        $developer = new Employee('André', 500, Role::DBA);

        $salary = $this->calculatorOfSalaryHandler->calculate($developer);

        $this->assertEquals(500 * 0.85, $salary);
    }
}
