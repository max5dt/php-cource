<?php

declare(strict_types=1);

namespace Tests\Tasks;

use MyApp\Tasks\PerfectNumber;
use PHPUnit\Framework\TestCase;

class PerfectNumberTest extends TestCase
{
    /**
     * @dataProvider isPerfectProvider
     */
    public function testIsPerfect(int $num, bool $expected): void
    {
        $test = new PerfectNumber();

        self::assertEquals(
            $expected,
            $test->isPerfect($num)
        );
    }

    public function isPerfectProvider(): array
    {
        return [
            [6, true],
            [28, true],
            [496, true],
            [8128, true],
            [1, false],
            [0, false],
            [7, false],
            [8100, false],
        ];
    }

    public function testFibInvalidArgument(): void
    {
        $test = new PerfectNumber();

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Error: a positive number should be used');

        $test->isPerfect(-123);
    }
}
