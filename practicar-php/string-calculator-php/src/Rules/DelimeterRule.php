<?php

namespace Deg540\StringCalculatorPHP\Rules;

class DelimeterRule implements Rule
{
    private static string $SIMPLE_REGEX_DELIMITER = '/^\/\/(.+)\n/';
    private static string $MULTIPLE_REGEX_DELIMITER = '/^\/\/(\[.*?\])+\n/';

    public function manage(string|array $string): array {

        $delimiters = [","];

        if (preg_match($this::$MULTIPLE_REGEX_DELIMITER, $string, $matches)) {
            preg_match_all('/\[(.*?)\]/', $matches[1], $delimiterMatches);
            $delimiters = array_map(fn($delim) => preg_quote($delim, '/'), $delimiterMatches[1]);
            $string = preg_replace(self::$MULTIPLE_REGEX_DELIMITER, '', $string);
        }
        elseif (preg_match($this::$SIMPLE_REGEX_DELIMITER, $string, $matches)) {
            $delimiters = [preg_quote($matches[1], '/')];
            $string = preg_replace(self::$SIMPLE_REGEX_DELIMITER, '', $string);
        }

        $delimiterPattern = '/(' . implode('|', $delimiters) . '|\n)/';
        $numbers = preg_split($delimiterPattern, $string);
        $numbers = array_map('intval', array_map('trim', $numbers));

        return $numbers;
    }
}