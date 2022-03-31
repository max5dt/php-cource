<?php
declare(strict_types=1);

namespace MyApp\Tasks;

class HappyNumber
{
    public function isHappy(string $num): bool
    {
        if ((int)$num < 0) {
            throw new \InvalidArgumentException('Error: A positive number is expected.');
        }
        if ((preg_match('~^[-0123456789]+$~', $num)) === 0) {
            throw  new \InvalidArgumentException('Error: Invalid string. An integer number is expected.');
        }

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
}
