<?php

class Validator
{
    public static function isEmpty(string $string): bool
    {
        return $string == '';
    }
}
