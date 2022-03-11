<?php
declare(strict_types=1);

function isPowerOfThree(int $a): bool
{
    while ($a > 1) {
            if ($a % 3 !== 0) {
            return false;
        }
        $a /= 3;
    }
    return $a === 1;
}
