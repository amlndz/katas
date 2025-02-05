<?php

namespace Deg540\StringCalculatorPHP;

use Deg540\StringCalculatorPHP\Rules\DelimeterRule;
use Deg540\StringCalculatorPHP\Rules\MaximumNumerAllowedRule;
use Deg540\StringCalculatorPHP\Rules\NegativeNumberRule;

class StringCalculator
{
    public array $rules = [];
    public function __construct()
    {
        $this->rules[] = new DelimeterRule();
        $this->rules[] = new NegativeNumberRule();
        $this->rules[] = new MaximumNumerAllowedRule();
    }

    public function add($string) {

        if (empty($string)) {
            return 0;
        }

        if (strlen($string) == 1) {
            return $string;
        }

        $numbers = $this->rules[0]->manage($string);
        $numbers = $this->rules[1]->manage($numbers);
        $numbers = $this->rules[2]->manage($numbers);

        $result = 0;

        foreach ($numbers as $number) {
            $result += $number;
        }

        return $result;
    }
}