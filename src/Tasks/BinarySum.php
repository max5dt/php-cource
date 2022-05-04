<?php

declare(strict_types=1);

namespace MyApp\Tasks;

use MyApp\Logger\FileLogger;
use MyApp\Logger\LoggerInterface;
use MyApp\Logger\StdoutLogger;

class BinarySum
{

    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function binarySum(string $num1, string $num2): string
    {
        if ($num1 === "" || $num2 === "") {
            $this->logger->err('Log - Empty input');
            throw new \InvalidArgumentException('Error: Empty input');
        }
        if (((preg_match('~^[01]+$~', $num1)) === 0) || ((preg_match('~^[01]+$~', $num2)) === 0)) {
            $this->logger->err('Log - Not a binary number');
            throw  new \InvalidArgumentException('Error: Not a binary number');
        }

        $result = decbin(bindec($num1) + bindec($num2));

        $this->logger->info("Sum of " . $num1 . " and " . $num2 . " is " . $result);

        return $result;
    }
}
