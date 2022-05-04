<?php

declare(strict_types=1);

namespace Tests\Tasks;

use MyApp\Logger\FakeLogger;
use MyApp\Tasks\Fibonacci;
use PHPUnit\Framework\TestCase;

class FibonacciTest extends TestCase
{
    /**
     * @dataProvider fibProvider
     */
    public function testFib(int $num, int $expected): void
    {
        $logger = new FakeLogger();
        $test = new Fibonacci($logger);

        self::assertEquals(
            $expected,
            $test->fib($num)
        );

        self::assertEquals(
            "[INFO] Fibonacci number #" . $num . " is " . $expected,
            $logger->getLastMessage()
        );
    }

    public function fibProvider(): array
    {
        return [
            [3, 2],
            [5, 5],
            [10, 55],
            [15, 610],
        ];
    }

    public function testFibInvalidArgument(): void
    {
        $logger = new FakeLogger();
        $test = new Fibonacci($logger);


        try {
            $test->fib(-123);
        } catch (\Throwable $e) {
            self::assertInstanceOf(\InvalidArgumentException::class, $e);
            self::assertEquals('Error: a positive number should be used', $e->getMessage());
        }

        self::assertEquals("[ERR] A positive number should be used", $logger->getLastMessage());
    }
}
