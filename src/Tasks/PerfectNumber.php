<?php

declare(strict_types=1);

namespace MyApp\Tasks;

class PerfectNumber
{
    public function isPerfect(int $num): bool
    {
        if ($num < 0) {
            throw new \InvalidArgumentException('Error: a positive number should be used');
        }

        if ($num <= 0) {
            return false;
        }

        $sum = 0;
        for ($i = 1; $i < $num; ++$i) {
            if ($num % $i === 0) {
                $sum += $i;
            }
        }
        return $sum === $num;
    }
}
