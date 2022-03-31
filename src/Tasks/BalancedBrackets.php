<?php
declare(strict_types=1);

namespace MyApp\Tasks;

use http\Exception\InvalidArgumentException;

class BalancedBrackets
{
    public function isBalanced(string $str): bool
    {
        if ($str === '') {
            return true;
        }
        if ((preg_match('~^[()]+$~', $str)) === 0) {
            throw  new \InvalidArgumentException('Error: Invalid string. Only Brackets are allowed.');
        }

        while (str_contains($str, '()')) {
            $str = str_replace('()', '', $str);
        }
        return $str === '';
    }
}
