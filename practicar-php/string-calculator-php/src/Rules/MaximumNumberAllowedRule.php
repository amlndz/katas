<?php

namespace Deg540\StringCalculatorPHP\Rules;

class MaximumNumberAllowedRule implements Rule
{
    private static int $MAXIMUM_ALLOWED_NUMBER = 999;

    public function manage(array|string $numbers): array
    {
        return array_filter($numbers, fn($num) => $num <= self::$MAXIMUM_ALLOWED_NUMBER);
    }
}