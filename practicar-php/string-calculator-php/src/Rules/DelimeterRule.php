<?php

namespace Deg540\StringCalculatorPHP\Rules;

class DelimeterRule implements Rule
{

    public function manage(string $string): array {
        $numbers = str_replace("\n", ",", $string);
        $numbers = array_map('intval', array_map('trim', explode(',', $numbers)));
        return $numbers;
    }
}