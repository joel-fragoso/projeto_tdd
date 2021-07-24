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

    public function testShouldBeAbleToCalculateOfTheDeveloperSalaryWithUnderTheLimit()
    {
        $developer = new Employee('André', 1500, Role::DEVELOPER);

        $salary = $this->calculatorOfSalaryHandler->calculate($developer);

        $this->assertEquals(1500 * 0.9, $salary);
    }

    public function testShouldBeAbleToCalculateOfTheDeveloperSalaryWithOverTheLimit()
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

    public function testShouldBeAbleToCalculateOfTheDBASalaryWithUnderTheLimit()
    {
        $dba = new Employee('Maurício', 1500, Role::DBA);

        $salary = $this->calculatorOfSalaryHandler->calculate($dba);

        $this->assertEquals(1500 * 0.85, $salary);
    }

    public function testShouldBeAbleToCalculateOfTheDBASalaryWithOverTheLimit()
    {
        $dba = new Employee('Maurício', 4500, Role::DBA);

        $salary = $this->calculatorOfSalaryHandler->calculate($dba);

        $this->assertEquals(4500 * 0.75, $salary);
    }
}
