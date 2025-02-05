<?php

namespace Deg540\CleanCodeKata9\Rules;

class BuzzRule implements Rule
{
    public function isValid(int $number): bool
    {
        return $number % 5 === 0 || str_contains($number, '5');
    }

    public function getValue(): string
    {
        return 'Buzz';
    }
}