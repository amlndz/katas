<?php

namespace Deg540\StringCalculatorPHP\Rules;

class DelimeterRule implements Rule
{
    static $REGEXDELIMITER = '/^\/\/(.+)\n/';
    public function manage(string $string): array {

        $delimiter = ",";

        $numbers = str_replace("\n", $delimiter, $string);
        $numbers = array_map('intval', array_map('trim', explode($delimiter, $numbers)));
        return $numbers;
    }
}
