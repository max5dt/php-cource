<?php

declare(strict_types=1);

namespace MyApp\Tasks;

class FizzBuzz
{
    public function fizzBuzz(int $begin, int $end): void
    {
        echo $this->fizzBuzzGenerator($begin, $end);
    }

    public function fizzBuzzGenerator(int $begin, int $end): string
    {
        $result = [];

        for ($i = $begin; $i <= $end; ++$i) {
            $item = '';
            switch (true) {
                case (($i % 3 === 0) && ($i % 5 === 0)):
                    $item .= 'FizzBuzz';
                    break;
                case ($i % 3 === 0):
                    $item .= 'Fizz';
                    break;
                case ($i % 5 === 0):
                    $item .= 'Buzz';
                    break;
                default:
                    $item .= $i;
            }
            $result[] = $item;
        }
        return implode(' ', $result);
    }
}
