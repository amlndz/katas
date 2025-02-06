<?php

namespace Deg540\CleanCodeKata9\Rules;

class FizzBuzzRule implements Rule
{
    public function isValid(int $number): bool
    {
        $fizz = new FizzRule();
        $buzz = new BuzzRule();
        if ($fizz->isValid($number) && $buzz->isValid($number)) {
            return true;
        }

        return false;
    }

    public function getValue(): string
    {
        return 'FizzBuzz';
    }
}