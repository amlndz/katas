<?php

declare(strict_types=1);

namespace Deg540\StringCalculatorPHP\Test;

use Deg540\StringCalculatorPHP\StringCalculator;
use PHPUnit\Framework\TestCase;

final class StringCalculatorTest extends TestCase
{
    /**
     * @test
     */
    public function givenEmptyParameterReturns0(): void
    {
        $calculator = new StringCalculator();

        $result = $calculator->add("");

        $this->assertEquals(0, $result);
    }

    /**
     * @test
     */
    public function givenOneParameterReturnsParameterValue(): void
    {
        $calculator = new StringCalculator();

        $result = $calculator->add("2");

        $this->assertEquals(2, $result);
    }

    /**
     * @test
     */
    public function givenTwoParameterReturnsSumResult(): void
    {
        $calculator = new StringCalculator();

        $result = $calculator->add("2,5");

        $this->assertEquals(7, $result);
    }

    /**
     * @test
     */
    public function givenThreeParameterReturnsSumResult(): void
    {
        $calculator = new StringCalculator();

        $result = $calculator->add("2,5, 8");

        $this->assertEquals(15, $result);
    }

    /**
     * @test
     */
    public function givenParametersWithLineBreakReturnsSumResult(): void
    {
        $calculator = new StringCalculator();
        $result = $calculator->add("1\n2,3");
        $this->assertEquals(6, $result);
    }

    /**
     * @test
     */
    public function givenParametersWithEspecialDelimeterReturnsSumResult(): void
    {
        $calculator = new StringCalculator();
        $result = $calculator->add("//;\n1;2;6");
        $this->assertEquals(9, $result);
    }

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
