<?php

namespace Deg540\StringCalculatorPHP\Test\Rules;

use Deg540\StringCalculatorPHP\StringCalculator;
use PHPUnit\Framework\TestCase;

class DelimeterRuleTest extends TestCase
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

    /**
     * @test
     */
    public function givenMultiplesDelimiterReturnsSumResult(): void
    {
        $result = $this->calculator->add("//[***][###]\n1***2###3");

        $this->assertEquals(6, $result);
    }

}