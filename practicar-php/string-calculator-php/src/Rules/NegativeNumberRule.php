<?php

namespace Deg540\StringCalculatorPHP\Rules;

class NegativeNumberRule implements Rule
{

    public function manage(array|string $numbers): array
    {
        $negatives = array_filter($numbers, fn($num) => $num < 0);

        if (!empty($negatives)) {
            throw new InvalidArgumentException("Negativos no soportados: " . implode(', ', $negatives));
        }

        return $numbers;
    }
}