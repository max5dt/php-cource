<?php
declare(strict_types=1);

function isHappy(string $num): bool
{
    $length = strlen($num);
    if ($length % 2 !== 0) {
        return false;
    }

    $half1 = (int)substr($num, 0, ($length / 2));
    $half2 = (int)substr($num, ($length / 2));
    $sum1 = 0;
    $sum2 = 0;

    for ($i = 1; $i <= ($length / 2); ++$i) {
        $sum1 += $half1 % 10;
        $sum2 += $half2 % 10;
        $half1 = intdiv($half1, 10);
        $half2 = intdiv($half2, 10);
    }

    return $sum1 === $sum2;
}
