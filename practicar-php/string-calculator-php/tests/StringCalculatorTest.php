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
    public function givenNoParametersReturns0(): void
    {
        $calculator = new StringCalculator();

        $result = $calculator->add();

        $this->assertEquals(0, $result);

    }
}