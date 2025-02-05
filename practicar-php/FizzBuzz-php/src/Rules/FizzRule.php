<?php

namespace Deg540\CleanCodeKata9\Rules;

class FizzRule implements Rule
{
    public function isValid(int $number): bool
    {
        return $number % 3 === 0 ||  str_contains($number, '3');
    }

    public function getValue(): string
    {
        return 'Fizz';
    }
}