<?php

declare(strict_types=1);

namespace AppTest\Utils\Handler;

use App\Utils\Handler\ConvertRomanNumeralsToIntegerHandler;
use PHPUnit\Framework\TestCase;

/**
 * Class ConvertRomanNumeralsToIntegerHandlerTest
 *
 * @package App\Utils\Handler
 */
class ConvertRomanNumeralsToIntegerHandlerTest extends TestCase
{
    private ConvertRomanNumeralsToIntegerHandler $convertRomanNumeralsToIntegerHandler;

    public function setUp(): void
    {
        $this->convertRomanNumeralsToIntegerHandler = new ConvertRomanNumeralsToIntegerHandler();
    }

    public function testShouldBeAbleToUnderstandTheSymbol()
    {
        $integer = $this->convertRomanNumeralsToIntegerHandler->convert('D');

        $this->assertEquals(500, $integer);
    }

    public function testShouldBeAbleToUnderstandTheVSymbol()
    {
        $integer = $this->convertRomanNumeralsToIntegerHandler->convert('V');

        $this->assertEquals(5, $integer);
    }

    public function testShouldBeAbleToUnderstandTheIISymbol()
    {
        $integer = $this->convertRomanNumeralsToIntegerHandler->convert('II');

        $this->assertEquals(2, $integer);
    }

    public function testShouldBeAbleToUnderstandTheXXIISymbol()
    {
        $integer = $this->convertRomanNumeralsToIntegerHandler->convert('XXII');

        $this->assertEquals(22, $integer);
    }

    public function testShouldBeAbleToUnderstandTheIXSymbol()
    {
        $integer = $this->convertRomanNumeralsToIntegerHandler->convert('IX');

        $this->assertEquals(9, $integer);
    }

    public function testShouldBeAbleToUnderstandTheXXIVSymbol()
    {
        $integer = $this->convertRomanNumeralsToIntegerHandler->convert('XXIV');

        $this->assertEquals(24, $integer);
    }
}
