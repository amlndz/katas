<?php

namespace Deg540\StringCalculatorPHP\Rules;

interface Rule
{
    public function manage(string|array $intput): array;
}