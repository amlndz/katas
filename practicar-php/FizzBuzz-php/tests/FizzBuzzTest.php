<?php

namespace Deg540\CleanCodeKata9\Test;

use PHPUnit\Framework\TestCase;
use Deg540\CleanCodeKata9\FizzBuzz;

class FizzBuzzTest extends TestCase
{
    public $fizzBuzz = null;

    public function setUp(): void
    {
        $this->fizzBuzz = new FizzBuzz();
    }

    public function tearDown(): void
    {
        unset($this->fizzBuzz);
    }

    /**
     * @test
     */
    public function given1Returns1(): void
    {
        $result = $this->fizzBuzz->execute(1);

        $this->assertEquals('1', $result);
    }

    /**
     * @test
     */
    public function given8Returns8(): void
    {
        $result = $this->fizzBuzz->execute(8);

        $this->assertEquals('8', $result);
    }

    /**
     * @test
     */
    public function given3ReturnsFizz(): void
    {
        $result = $this->fizzBuzz->execute(3);

        $this->assertEquals('Fizz', $result);
    }

    /**
     * @test
     */
    public function given5ReturnsBuzz(): void
    {
        $result = $this->fizzBuzz->execute(5);

        $this->assertEquals('Buzz', $result);
    }
}