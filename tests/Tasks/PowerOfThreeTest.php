<?php

declare(strict_types=1);

namespace Tests\Tasks;

use MyApp\Tasks\PowerOfThree;
use PhpParser\Node\Expr\AssignOp\Pow;
use PHPUnit\Framework\TestCase;

class PowerOfThreeTest extends TestCase
{
    /**
     * @dataProvider isPowerOfThreeProvider
     */
    public function testIsPowerOfThree(int $num, bool $expected): void
    {
        $test = new PowerOfThree();

        self::assertEquals(
            $expected,
            $test->isPowerOfThree($num)
        );
    }

    public function isPowerOfThreeProvider(): array
    {
        return [
            [9, true],
            [243, true],
            [2187, true],
            [59049, true],
            [1, true],
            [0, false],
            [7, false],
            [8100, false]
        ];
    }

    public function testIsPowerOfThreeInvalidArgument(): void
    {
        $test = new PowerOfThree();

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Error: a positive number should be used');

        $test -> isPowerOfThree(-123);
    }
}
