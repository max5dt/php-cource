<?php

declare(strict_types=1);

namespace Tests\Tasks;

use MyApp\Tasks\AddingDigits;
use PHPUnit\Framework\TestCase;

class AddingDigitsTest extends TestCase
{
    /**
     * @dataProvider addDigitsProvider
     */
    public function testAddDigits(int $num, int $expected): void
    {
        $test = new AddingDigits();

        self::assertEquals(
            $expected,
            $test->addDigits($num)
        );
    }

    public function addDigitsProvider(): array
    {
        return [
            [0, 0],
            [1, 1],
            [9, 9],
            [10, 1],
            [38, 2],
            [101, 2],
            [505, 1],
            [9008, 8],
            [1023421342135213, 1]
        ];
    }

    public function testAddDigitsInvalidArgument(): void
    {
        $test = new AddingDigits();

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Error: a positive number should be used');

        $test -> addDigits(-123);
    }
}
