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

        $result = 0;

        foreach ($numbers as $number) {
            $result += $number;
        }
        
        return $result;
    }
}