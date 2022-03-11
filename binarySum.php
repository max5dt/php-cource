<?php
declare(strict_types=1);

function binarySum(string $num1, string $num2): string
{
    return decbin(bindec($num1) + bindec($num2));
}
