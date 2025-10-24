<?php

namespace Core;

class Validator
{
    public static function string($string, $min = 1, $max = INF)
    {
        $string = trim($string);

        return strlen($string) >= $min && strlen($string) <= $max;
    }

    public static function email($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}
