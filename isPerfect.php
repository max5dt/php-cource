<?php
declare(strict_types=1);

function isPerfect(int $num): bool
{
	$sum = 0;
	for ($i=1; $i<$num; ++$i) 	{
		if ($num % $i === 0) {
			$sum += $i;
		}		
	}
	return $sum === $num;
}
