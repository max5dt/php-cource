<?php

declare(strict_types=1);

namespace MyApp\Tasks;

class PowerOfThree
{
    public function isPowerOfThree(int $a): bool
    {
        if ($a < 0) {
            throw new \InvalidArgumentException('Error: a positive number should be used');
        }

        while ($a > 1) {
            if ($a % 3 !== 0) {
                return false;
            }
            $a /= 3;
        }
        return $a === 1;
    }
}
