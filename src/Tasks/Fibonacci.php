<?php

declare(strict_types=1);

namespace MyApp\Tasks;

use MyApp\Logger\LoggerInterface;

class Fibonacci
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function fib(int $a): int
    {
        if ($a < 0) {
            $this->logger->err('A positive number should be used');
            throw new \InvalidArgumentException('Error: a positive number should be used');
        }

        $fibCurrent = 0;
        $fibNext = 1;
        for ($i = 1; $i <= $a; ++$i) {
            $fibNext = $fibCurrent + $fibNext;
            $fibCurrent = $fibNext - $fibCurrent;
        }

        $this->logger->info("Fibonacci number #" . $a . " is " . $fibCurrent);

        return $fibCurrent;
    }
}
