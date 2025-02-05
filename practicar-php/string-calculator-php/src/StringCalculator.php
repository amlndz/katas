<?php

namespace Deg540\StringCalculatorPHP;

use Deg540\StringCalculatorPHP\Rules\MaximumNumberAllowedRule;
use Deg540\StringCalculatorPHP\Rules\NegativeNumberRule;
class StringCalculator
{
    public array $rules = [];
    public function __construct()
    {
        $this->rules[] = new NegativeNumberRule();
        $this->rules[] = new MaximumNumberAllowedRule();
    }

    public function add($string) {

        if (empty($string)) {
            return 0;
        }

        if (strlen($string) == 1) {
            return $string;
        }

        $numbers = Delimiter::delimiter($string);

        foreach ($this->rules as $rule) {
            $numbers = $rule->manage($numbers);
        }

        $result = 0;

        foreach ($numbers as $number) {
            $result += $number;
        }

        return $result;
    }
}