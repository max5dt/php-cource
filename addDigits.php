<?php
declare(strict_types=1);

function addDigits(int $a): int
{
    $sum = 0;
    while (intdiv($a, 10) > 0) {

        if ($a % 10 === 0) {
            $a = intdiv($a, 10);
        }

        while ($a % 10 > 0) {
            $sum += $a % 10;
            $a = intdiv($a, 10);
        }
        print_r($sum . " ");
        $a = $sum;
        $sum = 0;
    }
    return $a;
}
