<?php

namespace Deg540\StringCalculatorPHP;

class Delimiter
{
    private static string $SIMPLE_REGEX_DELIMITER = '/^\/\/(.+)\n/';
    private static string $MULTIPLE_REGEX_DELIMITER = '/^\/\/(\[.*?\])+\n/';

    public static function delimiter(string $string): array {

        $delimiters = [","];

        if (preg_match(self::$MULTIPLE_REGEX_DELIMITER, $string, $matches)) {
            preg_match_all('/\[(.*?)]/', $matches[1], $delimiterMatches);
            $delimiters = array_map(fn($delim) => preg_quote($delim, '/'), $delimiterMatches[1]);
            $string = preg_replace(self::$MULTIPLE_REGEX_DELIMITER, '', $string);
        }

        if (preg_match(self::$SIMPLE_REGEX_DELIMITER, $string, $matches)) {
            $delimiters = [preg_quote($matches[1], '/')];
            $string = preg_replace(self::$SIMPLE_REGEX_DELIMITER, '', $string);
        }

        $delimiterPattern = '/(' . implode('|', $delimiters) . '|\n)/';
        $numbers = preg_split($delimiterPattern, $string);

        return array_map('intval', array_map('trim', $numbers));
    }
}