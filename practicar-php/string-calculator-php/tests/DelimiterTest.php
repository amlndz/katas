<?php

namespace Deg540\StringCalculatorPHP\Test;

use Deg540\StringCalculatorPHP\Delimiter;
use PHPUnit\Framework\TestCase;

class DelimiterTest extends TestCase
{
    /**
     * @test
     */
    public function removeLineBreakerDelimiter(): void
    {
        $delimiter = new Delimiter();

        $result = $delimiter->delimiter("1\n2,3");

        $this->assertEquals([1, 2, 3], $result);
    }

    /**
     * @test
     */
    public function removeSpecialDelimiter(): void
    {
        $delimiter = new Delimiter();

        $result = $delimiter->delimiter("//;\n1;2;6");

        $this->assertEquals([1, 2, 6], $result);
    }

    /**
     * @test
     */
    public function removeLongSpecialDelimiter(): void
    {
        $delimiter = new Delimiter();

        $result = $delimiter->delimiter("//[***]\n1***2***3");

        $this->assertEquals([1, 2, 3], $result);
    }
}