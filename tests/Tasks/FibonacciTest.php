<?php

declare(strict_types=1);

namespace Tests\Tasks;

use MyApp\Tasks\Fibonacci;
use PHPUnit\Framework\TestCase;

class FibonacciTest extends TestCase
{
    /**
     * @dataProvider fibProvider
     */
    public function testFib(int $num, int $expected): void
    {
        $test = new Fibonacci();

        self::assertEquals(
            $expected,
            $test->fib($num)
        );
    }

    public function fibProvider(): array
    {
        return [
            [3, 2],
            [5, 5],
            [10, 55],
            [15, 610]
        ];
    }

    public function testFibInvalidArgument(): void
    {
        $test = new Fibonacci();

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Error: a positive number should be used');

        $test -> fib(-123);
    }
}
