<?php

declare(strict_types=1);

namespace Tests\Tasks;

use MyApp\Tasks\FizzBuzz;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    /**
     * @dataProvider fizzBuzzProvider
     */
    public function testFizzBuzzGenerate(int $num1, int $num2, string $expected): void
    {
        $test = new FizzBuzz();

        self::assertEquals(
            $expected,
            $test->fizzBuzzGenerator($num1, $num2)
        );
    }

    public function fizzBuzzProvider(): array
    {
        return [
            [1, 16, '1 2 Fizz 4 Buzz Fizz 7 8 Fizz Buzz 11 Fizz 13 14 FizzBuzz 16'],
            [20, 1, ''],
            [-1, 0, '-1 FizzBuzz'],
            [0, 0, 'FizzBuzz'],
            [1, 1, '1'],
            [1, 0, '']
        ];
    }
}
