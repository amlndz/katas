<?php

namespace Deg540\StringCalculatorPHP\Rules;

class DelimeterRule implements Rule
{
    private static string $SIMPLE_REGEX_DELIMITER = '/^\/\/(.+)\n/';
    public function manage(string|array $string): array {

        $delimiter = ",";

        if (preg_match($this::$SIMPLE_REGEX_DELIMITER, $string, $matches)) {
            $delimiter = preg_quote($matches[1], '/');
            $string = preg_replace($this::$SIMPLE_REGEX_DELIMITER, '', $string);
        }

        $numbers = str_replace("\n", $delimiter, $string);
        $numbers = array_map('intval', array_map('trim', explode($delimiter, $numbers)));
        return $numbers;
    }
}
