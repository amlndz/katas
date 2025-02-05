<?php

namespace Deg540\StringCalculatorPHP\Rules;

class DelimeterRule implements Rule
{
    private static string $REGEXDELIMITER = '/^\/\/(.+)\n/';
    public function manage(string|array $string): array {

        $delimiter = ",";

        if (preg_match(self::$REGEXDELIMITER, $string, $matches)) {
            $delimiter = preg_quote($matches[1], '/');
            $string = preg_replace(self::$REGEXDELIMITER, '', $string);
        }

        $numbers = str_replace("\n", $delimiter, $string);
        $numbers = array_map('intval', array_map('trim', explode($delimiter, $numbers)));
        return $numbers;
    }
}
