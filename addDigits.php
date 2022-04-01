<?php
declare(strict_types=1);

function addDigits(int $a): int
{
    $sum = 0;
    $len = strlen((string)$a);

    while (intdiv($a, 10) > 0) {
        for ($i = 0; $i <= $len; $i++) {
            $sum += $a % 10;
            $a = intdiv($a, 10);
        }
        $a = $sum;
        $sum = 0;
    }

    return $a;
}
