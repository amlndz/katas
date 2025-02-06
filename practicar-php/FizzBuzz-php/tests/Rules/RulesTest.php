<?php

namespace Deg540\CleanCodeKata9\Test\Rules;

use Deg540\CleanCodeKata9\FizzBuzz;
use Deg540\CleanCodeKata9\Version\NewVersion;
use PHPUnit\Framework\TestCase;

class RulesTest extends TestCase
{
    public FizzBuzz $fizzBuzz;

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
    public function givenMultipleOf3ReturnsFizz(): void
    {
        $result = $this->fizzBuzz->execute(9);

        $this->assertEquals('Fizz', $result);
    }

    /**
     * @test
     */
    public function givenMultipleOf5ReturnsBuzz(): void
    {
        $result = $this->fizzBuzz->execute(25);

        $this->assertEquals('Buzz', $result);
    }

    /**
     * @test
     */
    public function givenMultipleOf3And5ReturnsFizzBuzz(): void
    {
        $result = $this->fizzBuzz->execute(15);

        $this->assertEquals('FizzBuzz', $result);
    }

    /**
     * @test
     */
    public function givenNumberContains3ReturnsFizz(): void
    {
        $result = $this->fizzBuzz->execute(31);

        $this->assertEquals('Fizz', $result);
    }

    /**
     * @test
     */
    public function givenWichNumberContains5ReturnsFizz(): void
    {
        $result = $this->fizzBuzz->execute(58);

        $this->assertEquals('Buzz', $result);
    }

    /**
     * @test
     */
    public function givenNumberWichContains3And5ReturnsFizzBuzz(): void
    {
        $result = $this->fizzBuzz->execute(53);

        $this->assertEquals('FizzBuzz', $result);
    }
}