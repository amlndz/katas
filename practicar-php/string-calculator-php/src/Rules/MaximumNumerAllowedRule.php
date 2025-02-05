<?php

namespace Deg540\StringCalculatorPHP\Rules;

class MaximumNumerAllowedRule implements Rule
{
    static $MAXIMUMALLOWEDNUMBER = 999;

    public function manage(array|string $numbers): array
    {
        $allowedNumbers= array_filter($numbers, fn($num) => $num <= self::$MAXIMUMALLOWEDNUMBER);

        return $allowedNumbers;
    }
}