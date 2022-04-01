<?php
declare(strict_types=1);

namespace MyApp\Tasks;

class Fibonacci
{
    public function fib(int $a): int
    {
        if ( $a < 0 ) {
            throw new \InvalidArgumentException('Error: a positive number should be used');
        }

        $fibCurrent = 0;
        $fibNext = 1;
        for ($i=1; $i <= $a; ++$i) {
            $fibNext = $fibCurrent + $fibNext;
            $fibCurrent = $fibNext - $fibCurrent;
        }
        return $fibCurrent;
    }
}
