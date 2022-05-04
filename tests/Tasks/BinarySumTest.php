<?php

declare(strict_types=1);

namespace Tests\Tasks;

use MyApp\Logger\FakeLogger;
use MyApp\Tasks\BinarySum;
use PHPUnit\Framework\TestCase;

class BinarySumTest extends TestCase
{
    /**
     * @dataProvider binarySumProvider
     */
    public function testBinarySum(string $num1, string $num2, string $expected): void
    {
        $logger = new FakeLogger();
        $test = new BinarySum($logger);

        self::assertEquals(
            $expected,
            $test->binarySum($num1, $num2)
        );

        self::assertEquals(
            "[INFO] Sum of " . $num1 . " and " . $num2 . " is " . $expected,
            $logger->getLastMessage()
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
        $logger = new FakeLogger();
        $test = new BinarySum($logger);

        try {
            $test->binarySum($num1, $num2);
        } catch (\Throwable $e) {
            self::assertInstanceOf(\InvalidArgumentException::class, $e);
            self::assertEquals('Error: Empty input', $e->getMessage());
        }

        self::assertEquals("[ERR] Empty input", $logger->getLastMessage());
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
        $logger = new FakeLogger();
        $test = new BinarySum($logger);

        try {
            $test->binarySum($num1, $num2);
        } catch (\Throwable $e) {
            self::assertInstanceOf(\InvalidArgumentException::class, $e);
            self::assertEquals('Error: Not a binary number', $e->getMessage());
        }

        self::assertEquals("[ERR] Not a binary number", $logger->getLastMessage());
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
