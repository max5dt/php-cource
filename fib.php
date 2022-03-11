<?php
declare(strict_types=1);

function fib(int $a): int
{
	$fibCurrent = 0;
	$fibNext = 1;
	for ($i=1; $i <= $a; ++$i) {
		$fibNext = $fibCurrent + $fibNext;
		$fibCurrent = $fibNext - $fibCurrent;
	}
	return $fibCurrent;
}
