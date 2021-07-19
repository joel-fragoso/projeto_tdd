<?php

declare(strict_types=1);

namespace App\Utils\Handler;

use function array_key_exists;

/**
 * Class ConvertRomanNumeralsToIntegerHandler
 *
 * @package App\Utils\Handler
 */
class ConvertRomanNumeralsToIntegerHandler
{
    /**
     * @var array
     */
    private array $romanNumeralsData = [
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000,
    ];

    /**
     * @param string $romanNumerals
     * @return int
     */
    public function convert(string $romanNumerals): int
    {
        $accumulator = 0;
        $lastNeighborOnTheRight = 0;

        for ($i = strlen($romanNumerals) - 1; $i >= 0; $i--) {
            $current = 0;
            $currentNumber = $romanNumerals[$i];

            if (array_key_exists($currentNumber, $this->romanNumeralsData)) {
                $current = $this->romanNumeralsData[$currentNumber];
            }

            $multiplier = 1;

            if ($current < $lastNeighborOnTheRight) {
                $multiplier = -1;
            }

            $accumulator += ($current * $multiplier);

            $lastNeighborOnTheRight = $current;
        }

        return $accumulator;
    }
}
