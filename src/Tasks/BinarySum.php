<?php
declare(strict_types=1);

namespace MyApp\Tasks;

class BinarySum
{
    public function binarySum(string $num1, string $num2): string
    {
        if ($num1 === "" || $num2 === "") {
            throw new \InvalidArgumentException('Empty input detected');
        }
        if (((preg_match('~^[01]+$~', $num1)) === 0) || ((preg_match('~^[01]+$~', $num2)) === 0)) {
            throw  new \InvalidArgumentException('Not a binary number detected');
        }

        return decbin(bindec($num1) + bindec($num2));
    }
}
