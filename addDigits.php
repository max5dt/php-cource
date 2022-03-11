<?php
declare(strict_types=1);

function addDigits(int $a) : int
{
	$sum = 0;
	while (intdiv($a, 10) > 0)  {
		while ($a % 10 > 0) {
			$sum += $a % 10;
			$a = intdiv($a, 10);
		}
		$a = $sum;
		$sum = 0;
	}
	return $a;
}
