<?php

namespace App;
class PrimeFactors
{
    // 10
    // 2 * 5

    // 24
    // 2 * 12
    // 2 * 2 * 6
    // 2 * 2 * 2 * 3

    public static function generate(int $number): array
    {
        $factors = [];

        for ($divider = 2; $number > 1; $divider++) {
            for (; $number % $divider === 0; $number /= $divider) {
                $factors[] = $divider;
            }
        }

        return $factors;
    }
}
