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
}
