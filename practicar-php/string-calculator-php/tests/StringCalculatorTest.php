<?php

declare(strict_types=1);

namespace Deg540\StringCalculatorPHP\Test;

use Deg540\StringCalculatorPHP\StringCalculator;
use PHPUnit\Framework\TestCase;

final class StringCalculatorTest extends TestCase
{
    public $calculator;

    public function setUp(): void
    {
        $this->calculator = new StringCalculator();
    }

    public function tearDown(): void
    {
        unset($this->calculator);
    }

    /**
     * @test
     */
    public function givenEmptyParameterReturns0(): void
    {
        $result = $this->calculator->add("");

        $this->assertEquals(0, $result);
    }

    /**
     * @test
     */
    public function givenOneParameterReturnsParameterValue(): void
    {
        $result = $this->calculator->add("2");

        $this->assertEquals(2, $result);
    }

    /**
     * @test
     */
    public function givenTwoParameterReturnsSumResult(): void
    {
        $result = $this->calculator->add("2,5");

        $this->assertEquals(7, $result);
    }

    /**
     * @test
     */
    public function givenThreeParameterReturnsSumResult(): void
    {
        $result = $this->calculator->add("2,5, 8");

        $this->assertEquals(15, $result);
    }

    /**
     * @test
     */
    public function givenNegativeNumbersThrowsException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Negativos no soportados: -2, -5");

        $this->calculator->add("1,-2,3,-5");
    }

    /**
     * @test
     */
    public function skipNonValidNumber(): void
    {
        $result = $this->calculator->add("//;\n1;2;6;9012");

        $this->assertEquals(9, $result);
    }

    /**
     * @test
     */
    public function givenParametersWithLineBreakReturnsSumResult(): void
    {
        $result = $this->calculator->add("1\n2,3");

        $this->assertEquals(6, $result);
    }

    /**
     * @test
     */
    public function givenParametersWithEspecialDelimeterReturnsSumResult(): void
    {
        $result = $this->calculator->add("//;\n1;2;6");

        $this->assertEquals(9, $result);
    }

    /**
     * @test
     */
    public function givenLongDelimitersReturnsSumResult(): void
    {
        $result = $this->calculator->add("//[***]\n1***2***3");

        $this->assertEquals(6, $result);
    }

//    /**
//     * @test
//     */
//    public function givenMultiplesDelimiterReturnsSumResult(): void
//    {
//        $result = $this->calculator->add("//[***][###]\n1***2###3");
//
//        $this->assertEquals(6, $result);
//    }
}
