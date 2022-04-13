<?php

declare(strict_types=1);

namespace Tests\Tasks;

use MyApp\Tasks\BalancedBrackets;
use PHPUnit\Framework\TestCase;

class BalancedBracketsTest extends TestCase
{
    /**
     * @dataProvider isBalancedProvider
     */
    public function testIsBalanced(string $str, bool $expected): void
    {
        $test = new BalancedBrackets();

        self::assertEquals(
            $expected,
            $test->isBalanced($str)
        );
    }

    public function isBalancedProvider(): array
    {
        return [
            ["()", true],
            ["((()))", true],
            ["()()()()()", true],
            ["(()(((())))(()))", true],
            [")", false],
            ["())", false],
            ["(()", false],
            ["((())", false],
            [")(", false],
            ["", true]
        ];
    }

    /**
     * @dataProvider isBalancedWrongArgumentProvider
     */
    public function testIsBalancedWrongArgument(string $str): void
    {
        $test = new BalancedBrackets();
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Error: Invalid string. Only Brackets are allowed.');

        $test->isBalanced($str);
    }

    public function isBalancedWrongArgumentProvider(): array
    {
        return [
            ['11'],
            ['word'],
            ['%%'],
            ['((|))'],
            ['true'],
            ['((()))]'],
            ['{}']
        ];
    }
}
