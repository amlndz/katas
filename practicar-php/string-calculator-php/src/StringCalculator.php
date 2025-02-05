<?php

namespace Deg540\StringCalculatorPHP;

class StringCalculator
{
    public function add($string) {

        if (empty($string)) {
            return 0;
        }

        if (strlen($string) == 1) {
            return $string;
        }

        $numbers = array_map('intval', array_map('trim', explode(',', $string)));
        $result = intval($numbers[0]) + intval($numbers[1]);

        return $result;
    }
}