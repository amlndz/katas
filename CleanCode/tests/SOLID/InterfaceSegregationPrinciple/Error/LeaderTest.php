<?php

namespace Deg540\PHPTestingBoilerplate\Test\SOLID\InterfaceSegregationPrinciple\Error;

use Deg540\PHPTestingBoilerplate\SOLID\InterfaceSegregationPrinciple\Error\Leader;
use Deg540\PHPTestingBoilerplate\SOLID\InterfaceSegregationPrinciple\Error\ThisIsNotMyJobException;
use Exception;
use PHPUnit\Framework\TestCase;

class LeaderTest extends TestCase
{
    private Leader $leader;

    protected function setUp(): void
    {
        parent::setUp();

        $this->leader = new Leader();
    }

    /**
     * @test
     */
    public function startWorkDaySuccessfully(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('He empezado a trabajar a las 9:00');

        $this->leader->startWorkDay('9:00');
    }

    /**
     * @test
     */
    public function finishWorkDaySuccessfully(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('He terminado de trabajar a las 21:00');

        $this->leader->finishWorkDay('21:00');
    }

    /**
     * @test
     */
    public function developSuccessfully(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Estoy gestionando empleados :)');

        $this->leader->manageEmployees();
    }

    /**
     * @test
     */
    public function thisIsNotMyJob(): void
    {
        $this->expectException(ThisIsNotMyJobException::class);
        $this->expectExceptionMessage('😠 Este no es mi trabajo 😠');

        $this->leader->develop();
    }
}
