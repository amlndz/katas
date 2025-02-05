<?php

namespace Deg540\StringCalculatorPHP\Test\Rules;

use Deg540\StringCalculatorPHP\StringCalculator;
use PHPUnit\Framework\TestCase;

class NumberRulesTest extends TestCase
{
    /**
     * @test
     */
    public function givenNegativeNumbersThrowsException(): void
    {
        $calculator = new StringCalculator();

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Negativos no soportados: -2, -5");

        $calculator->add("1,-2,3,-5");
    }

    /**
     * @test
     */
    public function givenNumberHigherThanMaximumAllowedIgnoredAndReturnSumResult(): void
    {
        $calculator = new StringCalculator();

        $result = $calculator->add("//;\n1;2;6;9012");

        $this->assertEquals(9, $result);
    }
}