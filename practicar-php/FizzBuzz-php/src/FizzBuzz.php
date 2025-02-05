<?php

namespace Deg540\CleanCodeKata9;

use Deg540\CleanCodeKata9\Rules\BuzzRule;
use Deg540\CleanCodeKata9\Rules\FizzBuzzRule;
use Deg540\CleanCodeKata9\Rules\FizzRule;
use Deg540\CleanCodeKata9\Rules\Rule;

class FizzBuzz
{
    /**
     * @var Rule[]
     */
    private array $rules;
    public function __construct() {
        $this->rules[] = new FizzBuzzRule();
        $this->rules[] = new FizzRule();
        $this->rules[] = new BuzzRule();
    }

    public function execute(int $number): string  {

        foreach ($this->rules as $rule) {
            if ($rule->isValid($number)) {
                return $rule->getValue();
            }
        }

        return $number;
    }
}