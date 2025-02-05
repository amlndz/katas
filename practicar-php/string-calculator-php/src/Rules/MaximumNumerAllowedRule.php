<?php

namespace Deg540\StringCalculatorPHP\Rules;

class MaximumNumerAllowedRule implements Rule
{
    private static int $MAXIMUMALLOWEDNUMBER = 999;

    public function manage(array|string $numbers): array
    {
        $allowedNumbers= array_filter($numbers, fn($num) => $num <= self::$MAXIMUMALLOWEDNUMBER);

        return $allowedNumbers;
    }
}