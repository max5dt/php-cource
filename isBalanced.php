<?php
declare(strict_types=1);

function isBalanced(string $str): bool
{
	while (str_contains($str, "()")) {
		$str = str_replace("()", "", $str);		
	}
	return $str === '';
}
