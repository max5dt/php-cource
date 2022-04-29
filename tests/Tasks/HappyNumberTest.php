<?php

declare(strict_types=1);

namespace Tests\Tasks;

use MyApp\Tasks\HappyNumber;
use PHPUnit\Framework\TestCase;

class HappyNumberTest extends TestCase
{
    /**
     * @dataProvider isHappyDataProvider
     */
    public function testIsHappy(string $num, bool $expected): void
    {
        $test = new HappyNumber();

        self::assertEquals(
            $expected,
            $test->isHappy($num)
        );
    }

    public function isHappyDataProvider(): array
    {
        return [
            ["385916", true],
            ["054702", true],
            ["11", true],
            ["432090", true],
            ["00", true],
            ["231002", false],
            ["1222", false],
            ["13", false],
            ["1", false],
            ["10", false],
        ];
    }


    public function testIsHappyNegativeNum(): void
    {
        $test = new HappyNumber();
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Error: A positive number is expected.');

        $test->isHappy("-10");
    }

    /**
     * @dataProvider isHappyInvalidArgumentDataProvider
     */
    public function testIsHappyInvalidArgument(string $num): void
    {
        $test = new HappyNumber();
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Error: Invalid string. An integer number is expected.');

        $test->isHappy($num);
    }

    public function isHappyInvalidArgumentDataProvider(): array
    {
        return [
            ['a12332'],
            ['21.22'],
            ['23$21'],
            ['%14'],
            ['eighteen'],
            [''],
        ];
    }
}
