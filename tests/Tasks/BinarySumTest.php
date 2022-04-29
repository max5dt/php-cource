<?php

declare(strict_types=1);

namespace Tests\Tasks;

use MyApp\Tasks\BinarySum;
use PHPUnit\Framework\TestCase;

class BinarySumTest extends TestCase
{
    /**
     * @dataProvider binarySumProvider
     */
    public function testBinarySum(string $num1, string $num2, string $expected): void
    {
        $test = new BinarySum();

        self::assertEquals(
            $expected,
            $test->binarySum($num1, $num2)
        );
    }

    public function binarySumProvider(): array
    {
        return [
            ['110', '1', '111'],
            ['110', '11', '1001'],
            ['1', '0', '1']
        ];
    }

    /**
     * @dataProvider binarySumEmptyArgumentDataProvider
     */
    public function testBinarySumEmptyArgument(string $num1, string $num2): void
    {
        $test = new BinarySum();
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Error: Empty input');

        $test->binarySum($num1, $num2);
    }

    public function binarySumEmptyArgumentDataProvider(): array
    {
        return [
            ['110', ''],
            ['', '11'],
            ['', '',],
        ];
    }

    /**
     * @dataProvider binarySumWrongArgumentDataProvider
     */
    public function testBinarySumWrongArgument(string $num1, string $num2): void
    {
        $test = new BinarySum();
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Error: Not a binary number');

        $test->binarySum($num1, $num2);
    }

    public function binarySumWrongArgumentDataProvider(): array
    {
        return [
            ['ab', '11'],
            ['0', '-0'],
            ['22', '12.4',],
            ['-4', '-4*5',],
            ['a', '%%',],
        ];
    }
}
