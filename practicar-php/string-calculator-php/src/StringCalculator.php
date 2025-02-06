<?php

namespace Deg540\StringCalculatorPHP;

use Deg540\StringCalculatorPHP\Rules\Rule;
use Deg540\StringCalculatorPHP\Rules\MaximumNumberAllowedRule;
use Deg540\StringCalculatorPHP\Rules\NegativeNumberRule;
class StringCalculator
{
    /**
     * @var Rule[]
     */
    public array $rules;

    public function __construct()
    {
        $this->rules = [
            new NegativeNumberRule(),
            new MaximumNumberAllowedRule()
        ];
    }

    public function add($string): int {
        if (empty($string)) {
            return 0;
        }

        if (strlen($string) == 1) {
            return (int)$string;
        }

        $numbers = Delimiter::delimiter($string);

        foreach ($this->rules as $rule) {
            $numbers = $rule->manage($numbers);
        }

        return array_sum($numbers);
    }
}