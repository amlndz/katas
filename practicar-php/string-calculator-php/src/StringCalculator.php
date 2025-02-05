<?php

namespace Deg540\StringCalculatorPHP;

use Deg540\StringCalculatorPHP\Rules\DelimeterRule;

class StringCalculator
{
    public array $rules = [];
    public function __construct()
    {
        $this->rules[] = new DelimeterRule();
    }
    public function add($string) {
        if (empty($string)) {
            return 0;
        }

        if (strlen($string) == 1) {
            return $string;
        }

        $numbers = $this->rules[0]->manage($string);

        $result = 0;

        foreach ($numbers as $number) {
            $result += $number;
        }

        return $result;
    }
}